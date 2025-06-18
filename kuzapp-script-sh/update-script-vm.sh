#!/bin/bash

# This program is free software : you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

# This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

echo #
echo  "\033[43;30m SCRIPT DE NETTOYAGE ET DE MISE À JOUR SYSTÈME LINUX / https://github.com/Kusanagi8200 \033[0m"

#Fonction qui vérifie que le script est lancé en sudo ou root.

echo #
if [ `whoami` != "root" ]
then
        echo  "\033[5;41;30m ATTENTION. VOUS DEVEZ AVOIR LES DROITS SUDO POUR LANCER CE SCRIPT \033[0m"
        exit 1
fi

#Fonction qui vérifie la presence des fichiers de log et les crée au besoin. 

echo #
echo  "\033[43;30m ---> CHECK DES FICHIERS DE LOG \033[0m"

echo #
if [ -e /var/log/update_upgrade.log ]
then
    echo  "\033[47;32m FICHIER \033[0m" /var/log/update_upgrade.log = "\033[47;32m OK \033[0m"
else
    echo  "\033[47;31m LE FICHIER N'EXISTE PAS \033[0m" & touch /var/log/update_upgrade.log
    echo  "\033[41;33m --> CRÉATION DU FICHIER \033[0m" /var/log/update_upgrade.log = "\033[47;32m DONE \033[0m"
fi

echo #
if [ -e /var/log/update_upgrade.err ]
then
    echo  "\033[47;32m FICHIER \033[0m" /var/log/update_upgrade.err = "\033[47;32m OK \033[0m"
else
    echo  "\033[47;31m LE FICHIER N'EXISTE PAS \033[0m" & touch /var/log/update_upgrade.err
    echo  "\033[41;33m --> CRÉATION DU FICHIER \033[0m" /var/log/update_upgrade.err = "\033[47;32m DONE \033[0m"
fi
echo #

#Séquence de nettoyage systeme update

echo #
echo  "\033[43;30m ---> NETTOYAGE PRE-MAJ \033[0m"
echo #
echo  "\033[44;37m APT CLEAN \033[0m"
apt clean 
echo Done
echo #
echo  "\033[44;37m APT AUTOCLEAN \033[0m"
apt autoclean
echo #
echo  "\033[44;37m APT REMOVE \033[0m"
apt remove 
echo #
echo  "\033[44;37m APT AUTOREMOVE \033[0m"
apt autoremove
echo #
echo  "\033[44;37m APT PURGE \033[0m"
apt purge
echo #

echo #
echo  "\033[43;30m <--- FIN DU NETTOYAGE PRE-MAJ \033[0m"

echo #
echo # 


# Séquence de mise à jour des paquets

# Afficher un message de début de mise à jour
echo  "\033[43;30m ---> MISE À JOUR DES PAQUETS \033[0m"

# Mettre à jour la liste des paquets disponibles
apt-get update 

# Afficher la liste des paquets qui peuvent être mis à jour
apt list --upgradable

# Mettre à jour les paquet
apt-get upgrade -y | tee -a /var/log/update_upgrade.log 2>> /var/log/update_upgrade.err

# Réparer les paquets cassés
apt-get --fix-broken install

# Afficher un message de fin de mise à jour
echo  "\033[43;30m <--- MISE À JOUR DES PAQUETS TERMINÉE \033[0m"
echo #

#Séquence de nettoyage systeme post mise à jour 
echo #
echo  "\033[43;30m ---> NETTOYAGE POST-MAJ \033[0m"
echo #
echo  "\033[44;37m APT CLEAN \033[0m"
apt clean 
echo Done
echo #
echo  "\033[44;37m APT AUTOCLEAN \033[0m"
apt autoclean
echo #
echo  "\033[44;37m APT REMOVE \033[0m"
apt remove 
echo #
echo  "\033[44;37m APT AUTOREMOVE \033[0m"
apt autoremove
echo #
echo  "\033[44;37m APT PURGE \033[0m"
apt purge
echo #

echo  "\033[43;30m ---> NETTOYAGE DU CACHE \033[0m"
sync; echo 3 > /proc/sys/vm/drop_caches
echo  "\033[44;37m DONE \033[0m"
echo # 

echo  "\033[43;30m ---> NETTOYAGE POUBELLE \033[0m"
rm -r -f ~/.local/share/Trash/files/*
echo  "\033[44;37m DONE \033[0m"
echo #

echo  "\033[43;30m ---> NETTOYAGE DES CONFIG DE PAQUETS \033[0m"
if [ "$(dpkg -l | grep ^rc)" ]; then
     dpkg -P $(dpkg -l | awk '/^rc/{print $2}')
else
    echo "\033[44;37m PAS DE PAQUETS À PURGER \033[0m"
fi
echo #

echo  "\033[43;30m <--- FIN DU NETTOYAGE POST-MAJ \033[0m"
echo #

#Fonction qui verifie les fichiers de log et affiche le log erreur si des erreurs sont presentes.

echo # 
echo  "\033[43;30m ---> FICHIER LOG ERREUR MAJ \033[0m"

if [ -e /var/log/update_upgrade.err ] && [ /var/log/update_upgrade.err -nt /var/log/update_upgrade.err ]
then
    echo  "\033[5;41;37m ATTENTION \033[0m"
    cat /var/log/update_upgrade.err
    echo
else
    echo  "\033[44;37m NO UPDATE ERROR \033[0m"
fi
echo #

# Reboot ? Function
confirm()
{
    read -r -p "${1} [y/N] " response

    case "$response" in
        [yY][eE][sS]|[yY]) 
            true
            ;;
        *)
            false
            ;;
    esac
}

if confirm "REBOOT ?"; then
   reboot
else
    echo #
    echo  "\033[44;30m ---> FIN DU SCRIPT <--- \033[0m"
    
fi
echo #

