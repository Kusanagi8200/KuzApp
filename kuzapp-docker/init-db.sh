#!/bin/bash

# Attendre que MariaDB soit prêt
until mysql -u root -e "SELECT 1"; do
    echo "Attente que MariaDB soit prêt..."
    sleep 2
done

# Création de la base de données et des utilisateurs
mysql -u root -e "CREATE DATABASE registration;"

mysql -u root -e "CREATE TABLE registration.users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;"

# Création de l'utilisateur 'admin1'
mysql -u root -e "CREATE USER 'admin1'@'localhost' IDENTIFIED BY 'Kusanagi2045';"
mysql -u root -e "GRANT ALL PRIVILEGES ON *.* TO 'admin1'@'localhost';"

# Rafraîchir les privilèges
mysql -u root -e "FLUSH PRIVILEGES;"
