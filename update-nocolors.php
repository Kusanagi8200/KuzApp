#!/bin/bash

# This program is free software : you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

# This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

echo "SCRIPT DE NETTOYAGE ET DE MISE À JOUR SYSTÈME LINUX / https://github.com/Kusanagi8200"

# Fonction qui vérifie que le script est lancé en sudo ou root.

if [ `whoami` != "root" ]
then
        echo "ATTENTION. VOUS DEVEZ AVOIR LES DROITS SUDO POUR LANCER CE SCRIPT"
        exit 1
fi

# Fonction qui vérifie la présence des fichiers de log et les crée au besoin.

echo "CHECK DES FICHIERS DE LOG"

if [ -e /var/log/update_upgrade.log ]
then
    echo "FICHIER /var/log/update_upgrade.log OK"
else
    echo "LE FICHIER N'EXISTE PAS" & touch /var/log/update_upgrade.log
    echo "--> CRÉATION DU FICHIER /var/log/update_upgrade.log DONE"
fi

if [ -e /var/log/update_upgrade.err ]
then
    echo "FICHIER /var/log/update_upgrade.err OK"
else
    echo "LE FICHIER N'EXISTE PAS" & touch /var/log/update_upgrade.err
    echo "--> CRÉATION DU FICHIER /var/log/update_upgrade.err DONE"
fi

# Séquence de nettoyage système update

echo "NETTOYAGE PRE-MAJ"

apt clean 
echo "Done"
apt autoclean
apt remove 
apt autoremove
apt purge

echo "FIN DU NETTOYAGE PRE-MAJ"


# Séquence de mise à jour des paquets

echo "MISE À JOUR DES PAQUETS"

apt-get update 
apt list --upgradable
apt-get upgrade -y | tee -a /var/log/update_upgrade.log 2>> /var/log/update_upgrade.err
apt-get --fix-broken install

echo "MISE À JOUR DES PAQUETS TERMINÉE"

# Séquence de nettoyage système post mise à jour 

echo "NETTOYAGE POST-MAJ"

apt clean 
echo "Done"
apt autoclean
apt remove 
apt autoremove
apt purge

echo "NETTOYAGE DU CACHE"
sync; echo 3 > /proc/sys/vm/drop_caches
echo "DONE"

echo "NETTOYAGE POUBELLE"
rm -r -f ~/.local/share/Trash/files/*
echo "DONE"

echo "NETTOYAGE DES CONFIG DE PAQUETS"
if [ "$(dpkg -l | grep ^rc)" ]; then
     dpkg -P $(dpkg -l | awk '/^rc/{print $2}')
else
    echo "PAS DE PAQUETS À PURGER"
fi

echo "FIN DU NETTOYAGE POST-MAJ"

# Fonction qui vérifie les fichiers de log et affiche le log erreur si des erreurs sont présentes.

echo "FICHIER LOG ERREUR MAJ"

if [ -e /var/log/update_upgrade.err ] && [ "$(stat -c %Y /var/log/update_upgrade.err)" -gt "$(stat -c %Y /var/log/update_upgrade.log)" ]
then
    echo "ATTENTION"
    cat /var/log/update_upgrade.err
    echo
else
    echo "NO UPDATE ERROR"
fi

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
    echo "FIN DU SCRIPT"
fi
