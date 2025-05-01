#!/bin/bash

set -e

LOG_FILE="/tmp/kuzapp_uninstall.log"
DRY_RUN=false

# Check for --dry-run option
if [[ "$1" == "--dry-run" ]]; then
    DRY_RUN=true
    echo -e "\033[33m[DRY-RUN MODE] No destructive actions will be executed.\033[0m"
fi

# Function to log messages
log_message() {
    local message=$1
    local status=$2
    local color_code=$3

    echo -e "$(date +'%Y-%m-%d %H:%M:%S') - $message" >> $LOG_FILE
    echo -e "$color_code$message\033[0m"
}

# Function to extract DB credentials from config.php
extract_db_credentials() {
    DB_USER=$(grep -oP 'define\("DB_USERNAME", "\K[^"]+' /var/www/html/KuzApp/config.php)
    DB_PASSWORD=$(grep -oP 'define\("DB_PASSWORD", "\K[^"]+' /var/www/html/KuzApp/config.php)
    DB_NAME=$(grep -oP 'define\("DB_NAME", "\K[^"]+' /var/www/html/KuzApp/config.php)
}

# Extract DB credentials from config.php
extract_db_credentials

# Interactive menu
echo "===== KuzApp Uninstall Script ====="
echo "Select what you want to uninstall:"
echo "1) Database only"
echo "2) Files and Apache configuration only"
echo "3) Installed system packages only"
echo "4) Full uninstallation (all components)"
read -rp "Your choice (1/2/3/4): " choice

# 1. Database removal
if [[ $choice == "1" || $choice == "4" ]]; then
    log_message "Preparing to drop MySQL database and user..." "[INFO]" "\033[34m"
    if $DRY_RUN; then
        echo "mysql -u $DB_USER -p$DB_PASSWORD DROP DATABASE $DB_NAME; DROP USER $DB_USER@localhost;"
    else
        mysql -u "$DB_USER" -p"$DB_PASSWORD" <<EOF
DROP DATABASE IF EXISTS $DB_NAME;
DROP USER IF EXISTS '$DB_USER'@'localhost';
FLUSH PRIVILEGES;
EOF
        log_message "Database '$DB_NAME' and user '$DB_USER' dropped." "[OK]" "\033[32m"
    fi
fi

# 2. File and Apache config removal
if [[ $choice == "2" || $choice == "4" ]]; then
    log_message "Preparing to remove Apache configurations and application files..." "[INFO]" "\033[34m"
    if $DRY_RUN; then
        echo "systemctl stop apache2"
        echo "a2dissite KuzApp.conf"
        echo "rm /etc/apache2/sites-available/KuzApp.conf"
        echo "rm -rf /var/www/html/KuzApp"
        echo "rm /etc/ssl/certs/kuzapp-selfsigned.crt"
        echo "rm /etc/ssl/private/kuzapp-selfsigned.key"
        echo "systemctl restart apache2"
    else
        sudo systemctl stop apache2

        if [ -f "/etc/apache2/sites-available/KuzApp.conf" ]; then
            sudo a2dissite KuzApp.conf
            sudo rm /etc/apache2/sites-available/KuzApp.conf
            log_message "Apache site cleaned" "[OK]" "\033[32m"
        fi

        if [ -d "/var/www/html/KuzApp" ]; then
            sudo rm -rf /var/www/html/KuzApp
            log_message "Application directory removed." "[OK]" "\033[32m"
        fi

        sudo rm -f /etc/ssl/certs/kuzapp-selfsigned.crt
        sudo rm -f /etc/ssl/private/kuzapp-selfsigned.key

        sudo systemctl restart apache2
        log_message "Apache service restarted." "[OK]" "\033[32m"
    fi
fi

# 3. System packages removal
if [[ $choice == "3" || $choice == "4" ]]; then
    log_message "Preparing to remove installed system packages..." "[INFO]" "\033[34m"
    if $DRY_RUN; then
        echo "apt remove --purge -y apache2 apache2-utils php php-mysql php-mysqli mariadb-server mariadb-client git openssl curl locate"
        echo "apt autoremove -y"
        echo "apt clean"
    else
        sudo apt remove --purge -y apache2 apache2-utils php php-mysql php-mysqli mariadb-server mariadb-client git openssl curl locate
        sudo apt autoremove -y
        sudo apt clean
        log_message "Installed packages removed and system cleaned." "[OK]" "\033[32m"
    fi
fi

# Final summary
log_message "Uninstallation process completed (mode: $([[ $DRY_RUN == true ]] && echo DRY-RUN || echo EXECUTION))." "[INFO]" "\033[34m"
log_message "You can find the full log in KuzApp-Uninstall.log" "[INFO]" "\033[34m"

# Export log to file
cat $LOG_FILE > KuzApp-Uninstall.log
