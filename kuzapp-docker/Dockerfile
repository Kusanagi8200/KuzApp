# Utilisation de l'image de base Debian latest
FROM debian:latest

# Mise à jour des paquets et installation des paquets nécessaires
RUN apt-get update && apt-get install -y \
    apache2 \
    wget \
    git \
    locate \
    nano \
    openssh-server \
    mariadn-server
    && rm -rf /var/lib/apt/lists/*

# Configuration d'Apache pour écouter sur le port 443
RUN sed -i 's/Listen 80/Listen 443/' /etc/apache2/ports.conf
RUN sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:443>/' /etc/apache2/sites-available/000-default.conf

# Création du répertoire pour le volume
RUN mkdir -p /var/www/html

# Exposer le port 443 (port standard pour HTTPS)
EXPOSE 443

# Définir le volume
VOLUME ["/var/www/html/KuzApp/"]

# Commande par défaut pour démarrer Apache en arrière-plan
CMD ["apache2ctl", "-D", "FOREGROUND"]


#docker build -t KuzApp .
#docker run -dit --name KuZapp -p 7080:80 -p 7443:443 -v KuZapp-Docker:/var/www/html/ debian bash
