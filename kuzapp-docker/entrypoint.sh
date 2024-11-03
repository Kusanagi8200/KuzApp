#!/bin/bash

# Démarrer le service MySQL
service mysql start

# Attendre que MySQL soit prêt
for i in {30..0}; do
    if service mysql status > /dev/null; then
        echo "MySQL est prêt."
        break
    fi
    echo "Attente que MariaDB soit prêt..."
    sleep 1
done

# Vérifier si le service n'a pas démarré
if ! service mysql status > /dev/null; then
    echo "Erreur: MariaDB n'a pas pu démarrer."
    exit 1
fi

# Exécuter le script de création de la base de données
if [ -f /docker-entrypoint-initdb.d/init-db.sh ]; then
    bash /docker-entrypoint-initdb.d/init-db.sh
fi

# Démarrer Apache
apachectl -D FOREGROUND
