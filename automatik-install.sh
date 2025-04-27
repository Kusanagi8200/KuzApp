#!/bin/bash

# Variables
IP="$IP"  # Replace with your server's IP address
DB_PASSWORD="$PASSWD"  # Replace with your desired database password

# 1. System update
echo "Updating the system..."
sudo apt update && sudo apt upgrade -y

# 2. Install necessary packages
echo "Installing necessary packages..."
sudo apt install -y apache2 php-mysql php-mysqli git php mariadb-server openssl

# Enable Apache modules
echo "Enabling Apache modules..."
sudo a2enmod ssl
sudo a2enmod rewrite

# Check if mysqli PHP module is enabled
echo "Checking mysqli PHP module..."
php -m | grep mysqli

# 3. Clone KuzApp repository
echo "Cloning KuzApp repository..."
sudo git clone https://github.com/Kusanagi8200/KuzApp.git /var/www/html/KuzApp

# 4. MySQL database setup
echo "Setting up MySQL database..."
sudo mysql -u root -e "
CREATE DATABASE registration;
USE registration;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE USER 'kuzapp_user'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON registration.* TO 'kuzapp_user'@'localhost';
FLUSH PRIVILEGES;
"

# 5. Generate a self-signed SSL certificate
echo "Generating self-signed SSL certificate..."
sudo mkdir -p /etc/ssl/private /etc/ssl/certs
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/kuzapp-selfsigned.key \
    -out /etc/ssl/certs/kuzapp-selfsigned.crt \
    -subj "/C=US/ST=State/L=City/O=KuzApp/OU=IT/CN=$IP"

# 6. Configure Apache Virtual Host
echo "Configuring Apache Virtual Host..."
sudo bash -c "cat > /etc/apache2/sites-available/KuzApp.conf <<EOF
<VirtualHost *:8443>
    ServerName 91.234.194.49
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

# Ensure Apache listens on port 8443
echo "Ensuring Apache is listening on port 8443..."

if ! grep -q "Listen 8443" /etc/apache2/ports.conf; then
    echo "Listen 8443" | sudo tee -a /etc/apache2/ports.conf
    echo "Port 8443 added to /etc/apache2/ports.conf."
else
    echo "Port 8443 already configured in /etc/apache2/ports.conf."
fi

# Enable site and restart Apache
echo "Enabling the site and restarting Apache..."
sudo a2ensite KuzApp.conf
sudo systemctl restart apache2

# 7. Set up file permissions
echo "Setting file permissions..."
sudo chown -R www-data:www-data /var/www/html/KuzApp
sudo chmod -R 755 /var/www/html/KuzApp

# 8. Configure database connection
echo "Configuring database connection..."
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

# 9. Verify the background image
echo "Verifying the background image..."
# Check if the background image KuzApp-Fond.jpg is present
if [ ! -f /var/www/html/KuzApp/KuzApp-Fond.jpg ]; then
    echo "The background image KuzApp-Fond.jpg is missing. Please download and place it in /var/www/html/KuzApp."
else
    echo "The background image is present."
fi

# 09. Restart Apache2 service
echo "Restarting Apache2 service to apply all configurations..."
sudo systemctl restart apache2

# 10. Finalization and test
echo "Installation completed. You can test the application by navigating to https://$IP:8443/KuzApp/login.php"
echo "Note: You may need to accept the self-signed certificate warning in your browser."
