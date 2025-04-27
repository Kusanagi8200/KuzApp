#!/bin/bash

# Set options to exit on errors and log every command
set -e

# Variables
IP="$IP"  # Replace with your server's IP address
DB_PASSWORD="$PASSWD"  # Replace with your desired database password
LOG_FILE="/tmp/kuzapp_install.log"  # Log file path

# Function to log messages with colors
log_message() {
    local message=$1
    local status=$2
    local color_code=$3

    # Format the log message with date and status
    echo -e "$(date +'%Y-%m-%d %H:%M:%S') - $message" >> $LOG_FILE

    # Display message with color
    echo -e "$color_code$message\033[0m"
}

# Function to check if a command exists
command_exists() {
    command -v "$1" >/dev/null 2>&1
}

# 1. System update
log_message "Updating the system..." "[INFO]" "\033[34m"
sudo apt update && sudo apt upgrade -y
log_message "System updated successfully." "[OK]" "\033[32m"

# 2. Install necessary packages
log_message "Installing necessary packages..." "[INFO]" "\033[34m"
if ! command_exists apache2; then
    sudo apt install -y apache2 php-mysql php-mysqli git php mariadb-server openssl
    log_message "Packages installed successfully." "[OK]" "\033[32m"
else
    log_message "Apache2 and dependencies already installed." "[ALREADY DONE]" "\033[33m"
fi

# Enable Apache modules
log_message "Enabling Apache modules..." "[INFO]" "\033[34m"
if ! apache2ctl -M | grep -q ssl_module; then
    sudo a2enmod ssl
    log_message "SSL module enabled." "[OK]" "\033[32m"
else
    log_message "SSL module already enabled." "[ALREADY DONE]" "\033[33m"
fi

if ! apache2ctl -M | grep -q rewrite_module; then
    sudo a2enmod rewrite
    log_message "Rewrite module enabled." "[OK]" "\033[32m"
else
    log_message "Rewrite module already enabled." "[ALREADY DONE]" "\033[33m"
fi

# 3. Clone KuzApp repository
log_message "Cloning KuzApp repository..." "[INFO]" "\033[34m"
if [ ! -d "/var/www/html/KuzApp" ]; then
    sudo git clone https://github.com/Kusanagi8200/KuzApp.git /var/www/html/KuzApp
    log_message "Repository cloned successfully." "[OK]" "\033[32m"
else
    log_message "KuzApp repository already exists." "[ALREADY DONE]" "\033[33m"
fi

# 4. MySQL database setup
log_message "Setting up MySQL database..." "[INFO]" "\033[34m"
sudo mysql -u root -e "
CREATE DATABASE IF NOT EXISTS registration;
USE registration;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE USER IF NOT EXISTS 'kuzapp_user'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON registration.* TO 'kuzapp_user'@'localhost';
FLUSH PRIVILEGES;
"
log_message "MySQL database and user configured." "[OK]" "\033[32m"

# 5. Generate a self-signed SSL certificate
log_message "Generating self-signed SSL certificate..." "[INFO]" "\033[34m"
if [ ! -f "/etc/ssl/certs/kuzapp-selfsigned.crt" ]; then
    sudo mkdir -p /etc/ssl/private /etc/ssl/certs
    sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
        -keyout /etc/ssl/private/kuzapp-selfsigned.key \
        -out /etc/ssl/certs/kuzapp-selfsigned.crt \
        -subj "/C=US/ST=State/L=City/O=KuzApp/OU=IT/CN=$IP"
    log_message "SSL certificate generated successfully." "[OK]" "\033[32m"
else
    log_message "SSL certificate already exists." "[ALREADY DONE]" "\033[33m"
fi

# 6. Configure Apache Virtual Host
log_message "Configuring Apache Virtual Host..." "[INFO]" "\033[34m"
if [ ! -f "/etc/apache2/sites-available/KuzApp.conf" ]; then
    sudo bash -c "cat > /etc/apache2/sites-available/KuzApp.conf <<EOF
<VirtualHost *:8443>
    ServerName $IP
    DocumentRoot /var/www/html/KuzApp

    SSLEngine on
    SSLCertificateFile /etc/ssl/certs/kuzapp-selfsigned.crt
    SSLCertificateKeyFile /etc/ssl/private/kuzapp-selfsigned.key

    <Directory /var/www/html/KuzApp>
        Require all granted
        AllowOverride All
        Options FollowSymLinks MultiViews
    </Directory>

    DirectoryIndex login.php
</VirtualHost>
EOF"
    log_message "Apache virtual host configured." "[OK]" "\033[32m"
else
    log_message "Virtual host already exists." "[ALREADY DONE]" "\033[33m"
fi

# Ensure Apache listens on port 8443
log_message "Ensuring Apache listens on port 8443..." "[INFO]" "\033[34m"
if ! grep -q "Listen 8443" /etc/apache2/ports.conf; then
    echo "Listen 8443" | sudo tee -a /etc/apache2/ports.conf
    log_message "Port 8443 added to /etc/apache2/ports.conf." "[OK]" "\033[32m"
else
    log_message "Port 8443 already configured." "[ALREADY DONE]" "\033[33m"
fi

# 7. Set up file permissions
log_message "Setting file permissions..." "[INFO]" "\033[34m"
sudo chown -R www-data:www-data /var/www/html/KuzApp
sudo chmod -R 755 /var/www/html/KuzApp
log_message "File permissions set." "[OK]" "\033[32m"

# 8. Configure database connection
log_message "Configuring database connection..." "[INFO]" "\033[34m"
if [ ! -f "/var/www/html/KuzApp/config.php" ]; then
    sudo bash -c "cat > /var/www/html/KuzApp/config.php <<EOF
<?php
\$host = 'localhost';
\$username = 'kuzapp_user';
\$password = '$DB_PASSWORD';
\$dbname = 'registration';

\$conn = mysqli_connect(\$host, \$username, \$password, \$dbname);

if (!\$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
EOF"
    log_message "Database connection configured." "[OK]" "\033[32m"
else
    log_message "Config.php already exists." "[ALREADY DONE]" "\033[33m"
fi

# 9. Verify the background image
log_message "Verifying the background image..." "[INFO]" "\033[34m"
if [ ! -f /var/www/html/KuzApp/KuzApp-Fond.jpg ]; then
    log_message "The background image KuzApp-Fond.jpg is missing. Please download and place it in /var/www/html/KuzApp." "[ERROR]" "\033[31m"
else
    log_message "The background image is present." "[OK]" "\033[32m"
fi

# 10. Restart Apache service
log_message "Restarting Apache2 service..." "[INFO]" "\033[34m"
sudo systemctl restart apache2
log_message "Apache2 restarted successfully." "[OK]" "\033[32m"

# Final output
log_message "Installation completed." "[INFO]" "\033[34m"
log_message "You can test the application by navigating to https://$IP:8443/KuzApp/login.php" "[INFO]" "\033[34m"
log_message "Note: You may need to accept the self-signed certificate warning in your browser." "[INFO]" "\033[34m"

# Display the log content
cat $LOG_FILE

# Optionally, you can remove the log file if you don't need to keep it
# rm $LOG_FILE
