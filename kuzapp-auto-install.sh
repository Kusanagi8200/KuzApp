
#!/bin/bash

# This program is free software : you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

# This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY.
echo #
echo #
echo -e "\033[38;5;214m█▄▀ █ █ ▀█▀ ▄▀▄ █▀▄ █▀▄ | Made by Kusanagi8200 - 2025\033[0m"
echo -e "\033[38;5;214m█ █ ▀▄█ █▄▄ █▀█ █▀  █▀  | https://github.com/Kusanagi8200\033[0m"
echo -e "\033[43;30mAUTOMATIK INSTALLATION - ADMIN-SYS TOOLS FROM THE KUZLAB \033[0m"
echo #

if [ `whoami` != "root" ]
then
        echo -e "\033[5;41;30m YOU MUST BE ROOT FOR RUN \033[0m"
        exit 1
fi

# Set options to exit on errors and log every command
set -e

# Prompt user for necessary inputs (with colored prompts and spacing)
echo -e "\033[48;5;208m\033[97;1m ENTER THE SERVER IP ADDRESS --> \033[0m"
read -rp "" IP
echo

echo -e "\033[48;5;208m\033[97;1m ENTER THE MYSQL DATABASE USERNAME --> \033[0m"
read -rp "" DB_USER
echo

echo -e "\033[48;5;208m\033[97;1m ENTER THE MYSQL DATABASE PASSWORD --> \033[0m"
read -rsp "" DB_PASSWORD
echo
echo

LOG_FILE="/tmp/kuzapp_install.log"

# Function to log messages with colors
log_message() {
    local message=$1
    local status=$2
    local color_code=$3
    local no_uppercase=$4  # Optional: if set, do not uppercase message

    echo -e "$(date +'%Y-%m-%d %H:%M:%S') - $message" >> $LOG_FILE

    local text_color="\033[30;1m"  # always black bold

    if [ "$no_uppercase" == "true" ]; then
        echo -e "${color_code}${text_color}${message}\033[0m"
    else
        echo -e "${color_code}${text_color}${message^^}\033[0m"
    fi
    echo
}

# Function to check if a package is installed
package_installed() {
    dpkg -l | grep -qw "$1"
}

# 1. System update
log_message " --> IN PROGRESS.... UPDATING THE SYSTEM... " "[INFO]" "\033[48;5;208m"
apt update && apt upgrade -y
echo #
log_message " --> SYSTEM UPDATED SUCCESSFULLY <-- " "[OK]" "\033[48;5;33m"

# Install Apache and utilities
if ! package_installed apache2; then
    apt-get install -y apache2 apache2-utils
    log_message " APACHE INSTALLED SUCCESSFULLY <--" "[OK]" "\033[48;5;33m"
else
    log_message " --> APACHE ALREADY INSTALLED <-- " "[ALREADY DONE]" "\033[48;5;220m"
fi

# Install Git
if ! command -v git >/dev/null 2>&1; then
    apt install -y git
    log_message " GIT INSTALLED SUCCESSFULLY <-- " "[OK]" "\033[48;5;28m"
else
    log_message " --> GIT ALREADY INSTALLED <-- " "[ALREADY DONE]" "\033[48;5;220m"
fi

# Install PHP and MariaDB
if ! command -v php >/dev/null 2>&1; then
    apt install -y php php-mysql php-mysqli
    log_message " PHP INSTALLED SUCCESSFULLY <-- " "[OK]" "\033[48;5;33m"
else
    log_message " --> PHP ALREADY INSTALLED <-- " "[ALREADY DONE]" "\033[48;5;220m"
fi

if ! package_installed mariadb-server; then
    apt-get install -y mariadb-server mariadb-client
    systemctl enable mariadb
    systemctl start mariadb
    log_message " MARIADB INSTALLED AND STARTED SUCCESSFULLY <--" "[OK]" "\033[48;5;33m"
else
    log_message " --> MARIADB ALREADY INSTALLED <-- " "[ALREADY DONE]" "\033[48;5;220m"
    systemctl start mariadb
fi

# Install additional utilities
if ! command -v openssl >/dev/null 2>&1; then
    apt install -y openssl curl locate
    log_message " UTILITIES INSTALLED SUCCESSFULLY <-- " "[OK]" "\033[48;5;28m"
else
    log_message " --> UTILITIES ALREADY INSTALLED <-- " "[ALREADY DONE]" "\033[48;5;220m"
fi

# Clean up after installations
log_message " --> IN PROGRESS.... CLEANING UP THE SYSTEM AFTER INSTALLATIONS... " "[INFO]" "\033[48;5;208m"
apt clean
apt autoclean
apt autoremove -y
echo #
log_message " SYSTEM CLEANED (CLEAN, AUTOCLEAN, AUTOREMOVE) <-- " "[OK]" "\033[48;5;33m"

# Enable Apache modules
log_message " --> IN PROGRESS.... ENABLING APACHE MODULES... " "[INFO]" "\033[48;5;208m"
a2enmod ssl || true
a2enmod rewrite || true
echo # 

# Clone KuzApp repository
log_message " --> IN PROGRESS.... CLONING KUZAPP REPOSITORY... " "[INFO]" "\033[48;5;208m"
if [ ! -d "/var/www/html/KuzApp" ]; then
    git clone https://github.com/Kusanagi8200/KuzApp.git /var/www/html/KuzApp
    log_message " REPOSITORY CLONED SUCCESSFULLY <-- " "[OK]" "\033[48;5;28m"
else
    log_message " --> KUZAPP REPOSITORY ALREADY EXISTS <-- " "[ALREADY DONE]" "\033[48;5;220m"
fi

# MySQL database setup
log_message "--> IN PROGRESS.... SETTING UP MYSQL DATABASE... " "[INFO]" "\033[48;5;208m"
mysql -u root -e "
CREATE DATABASE IF NOT EXISTS registration;
USE registration;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON registration.* TO '$DB_USER'@'localhost';
FLUSH PRIVILEGES;
"
log_message " MYSQL DATABASE AND USER CONFIGURED <-- " "[OK]" "\033[48;5;33m"

# Generate a self-signed SSL certificate
log_message " --> IN PROGRESS.... GENERATING SELF-SIGNED SSL CERTIFICATE... " "[INFO]" "\033[48;5;208m"
if [ ! -f "/etc/ssl/certs/kuzapp-selfsigned.crt" ]; then
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
        -keyout /etc/ssl/private/kuzapp-selfsigned.key \
        -out /etc/ssl/certs/kuzapp-selfsigned.crt \
        -subj "/C=US/ST=State/L=City/O=KuzApp/OU=IT/CN=$IP"
    log_message " SSL CERTIFICATE GENERATED SUCCESSFULLY <-- " "[OK]" "\033[48;5;33m"
else
    log_message " --> SSL CERTIFICATE ALREADY EXISTS <-- " "[ALREADY DONE]" "\033[48;5;220m"
fi

# Configure Apache Virtual Host
log_message " --> IN PROGRESS.... CONFIGURING APACHE VIRTUAL HOST... " "[INFO]" "\033[48;5;208m"
if [ ! -f "/etc/apache2/sites-available/KuzApp.conf" ]; then
    bash -c "cat > /etc/apache2/sites-available/KuzApp.conf <<EOF
<VirtualHost *:443>
    ServerName $IP
    DocumentRoot /var/www/html/KuzApp

    SSLEngine on
    SSLCertificateFile /etc/ssl/certs/kuzapp-selfsigned.crt
    SSLCertificateKeyFile /etc/ssl/private/kuzapp-selfsigned.key

    DirectoryIndex login.php

    <Directory /var/www/html/KuzApp>
        Require all granted
        AllowOverride All
        Options FollowSymLinks MultiViews
    </Directory>
</VirtualHost>
EOF"
    a2ensite KuzApp.conf
    log_message " APACHE VIRTUAL HOST CONFIGURED <-- " "[OK]" "\033[48;5;33m"
else
    log_message " --> VIRTUAL HOST ALREADY EXISTS <-- " "[ALREADY DONE]" "\033[48;5;220m"
fi

# Ensure Apache listens on port 443
log_message " --> IN PROGRESS.... ENSURING APACHE LISTENS ON PORT 443... " "[INFO]" "\033[48;5;208m"
if ! grep -q "Listen 443" /etc/apache2/ports.conf; then
    echo "Listen 443" | tee -a /etc/apache2/ports.conf
    log_message " PORT 443 ADDED TO /ETC/APACHE2/PORTS.CONF <-- " "[OK]" "\033[48;5;33m"
else
    log_message " --> PORT 443 ALREADY CONFIGURED <-- " "[ALREADY DONE]" "\033[48;5;220m"
fi

# Set up file permissions
log_message " --> IN PROGRESS.... SETTING FILE PERMISSIONS... " "[INFO]" "\033[48;5;208m"
chown -R www-data:www-data /var/www/html/KuzApp
chmod -R 755 /var/www/html/KuzApp
log_message " FILE PERMISSIONS SET <-- " "[OK]" "\033[48;5;33m"

# Configure database connection
log_message " --> IN PROGRESS.... CONFIGURING DATABASE CONNECTION (CONFIG.PHP)... " "[INFO]" "\033[48;5;208m"
bash -c 'cat > /var/www/html/KuzApp/config.php <<EOF
<?php
define("DB_SERVER", "localhost");
define("DB_USERNAME", "'"$DB_USER"'");
define("DB_PASSWORD", "'"$DB_PASSWORD"'");
define("DB_NAME", "registration");

\$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (\$conn === false) {
    die(" ERREUR --> NO CONNECTION TO BDD " . mysqli_connect_error());
}
?>
EOF'
log_message " DATABASE CONNECTION CONFIGURED IN CONFIG.PHP <-- " "[OK]" "\033[48;5;33m"

# Verify the background image
log_message " --> IN PROGRESS.... VERIFYING THE BACKGROUND IMAGE... " "[INFO]" "\033[48;5;208m"
if [ ! -f /var/www/html/KuzApp/KuzApp-Fond.jpg ]; then
    log_message " --> THE BACKGROUND IMAGE KuzApp-Fond.jpg IS MISSING. PLEASE PLACE IT IN /var/www/html/KuzApp <-- " "[ERROR]" "\033[48;5;196m"
else
    log_message " --> THE BACKGROUND IMAGE IS PRESENT <-- " "[OK]" "\033[48;5;33m"
fi

# Restart Apache service
log_message " --> IN PROGRESS.... RESTARTING APACHE2 SERVICE... " "[INFO]" "\033[48;5;208m"
systemctl restart apache2
log_message " APACHE2 RESTARTED SUCCESSFULLY <-- " "[OK]" "\033[48;5;33m"

# Final output (no uppercase on URL line)
log_message " --> INSTALLATION COMPLETED <--" "[INFO]" "\033[48;5;220m"
echo

echo -e "\033[48;5;208m\033[30;1m OK...NOW YOU CAN TEST KUZAPP ON LIVE --> \033[0m https://$IP/login.php"
echo
log_message " NOTE: YOU MAY NEED TO ACCEPT THE SELF-SIGNED CERTIFICATE WARNING IN YOUR BROWSER " "[INFO]" "\033[48;5;33m"

# Display the log content
cat $LOG_FILE > KuzApp-Install.log
