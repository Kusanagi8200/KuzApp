# Utiliser l'image Debian de base
FROM debian:latest

# Désactiver les invites interactives de l'installation
ENV DEBIAN_FRONTEND=noninteractive

# Mettre à jour les dépôts et installer les paquets nécessaires
RUN apt update && \
    apt install -y apache2 git locate mariadb-server mariadb-client php8.2 php8.2-mysqli libapache2-mod-php8.2 openssl && \
    apt clean && \
    apt autoclean && \
    apt remove && \
    apt autoremove && \
    rm -rf /var/lib/apt/lists/*

# Création des certificats SSL
RUN mkdir -p /var/www/html/KuzApp && \
    cd /var/www/html/KuzApp && \
    openssl genrsa -out kuzapp.key 2048 && \
    openssl req -new -key kuzapp.key -out kuzapp.csr -subj "/C=FR/ST=State/L=City/O=Organization/OU=Department/CN=localhost" && \
    openssl x509 -req -days 365 -in kuzapp.csr -signkey kuzapp.key -out /etc/ssl/certs/kusapp-selfsigned.crt && \
    mv kuzapp.key /etc/ssl/private/kusapp-selfsigned.key

# Création du fichier de configuration du VirtualHost
RUN echo '<VirtualHost *:80>\n\
    ServerName localhost\n\
\n\
    # Redirection vers HTTPS\n\
    Redirect permanent / https://localhost/ \n\
</VirtualHost>\n\
<VirtualHost *:443>\n\
    ServerName localhost\n\
\n\
    SSLEngine on\n\
    SSLCertificateFile /etc/ssl/certs/kusapp-selfsigned.crt\n\
    SSLCertificateKeyFile /etc/ssl/private/kusapp-selfsigned.key\n\
\n\
    # Utiliser login.php comme page par défaut\n\
    DirectoryIndex login.php\n\
\n\
    DocumentRoot /var/www/html/KuzApp\n\
\n\
    <Directory /var/www/html/KuzApp/>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/KuzApp.conf

# Activer le site KuzApp et désactiver le site par défaut
RUN a2dissite 000-default.conf && \
    a2ensite KuzApp.conf && \
    a2enmod ssl && \
    a2enmod php8.2 && \
    service apache2 restart

# Script pour initialiser la base de données
COPY init-db.sh /init-db.sh
RUN chmod +x /init-db.sh

# Exposer les ports 80 et 443 pour HTTP et HTTPS
EXPOSE 80 443

# Démarrer Apache et MariaDB lorsque le conteneur est lancé
CMD service mariadb start && /init-db.sh && apachectl -D FOREGROUND
