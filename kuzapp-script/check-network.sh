#!/bin/bash

# This program is free software : you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

# This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

echo # 
echo # 
echo "\033[44;30m CHECK NETWORK / LINUX .......................................//\033[0m"

if [ `whoami` != "root" ]
then
        echo -e "\033[5;41;30mATTENTION. VOUS DEVEZ AVOIR LES DROITS SUDO POUR LANCER CE SCRIPT \033[0m"
        exit 1
fi
echo #
echo #

# LISTER LES INTERFACES RESEAUX
echo "\033[43;30m INTERFACES RESEAUX ..........................................//\033[0m"
lshw -class network |grep -Ev "(capabilities|configuration|resources|capacity|version|vendor|width|clock|bus info)"
echo #
echo #

# LISTER CONFIG INTERFACES RESEAUX
echo "\033[43;30m CONFIG INTERFACES RESEAUX ...................................//\033[0m"
echo # 
check_network_tools () {
  if command -v ifconfig >/dev/null; then
   echo "\033[41;37m IFCONFIG \033[0m"
    ifconfig -a
  elif command -v ip >/dev/null; then
   echo "\033[41;37m RÉSULTAT DE IP -A \033[0m"
    ip -a
  else
    echo "\033[41;37m ERREUR --> PAS D'OUTILS RÉSEAUX DISPONIBLES \033[0m"
  fi
}

check_network_tools

echo #
echo #

# DETERMINER GATEWAY
echo "\033[43;30m GATEWAY .....................................................//\033[0m"
ip route | grep default | cut -d" " -f3
echo #
echo #

# PING
echo "\033[43;30m PING ........................................................//\033[0m"
ping 1.1.1.1 -c 5
echo #
echo #


# DETERMINER SERVEUR DNS
echo "\033[43;30m SERVEUR DNS .................................................//\033[0m"
#systemd-resolve --status |grep "DNS Server"
resolvectl status | grep "DNS Servers"
echo #
echo #

# ADRESSE IP PUBLIC
echo "\033[43;30m IP PUBLIC ...................................................//\033[0m"
wget -qO- https://api.ipify.org
echo #
echo #

# INFOS SUR LE ROUTAGE
echo "\033[43;30m ROUTAGE .....................................................//\033[0m"
netstat -grep
echo #
echo #

# INFOS SUR LE ROUTAGE2
echo "\033[43;30m ACTIVES CONNECTIONS .........................................//\033[0m"
netstat -alpnet
echo #
echo #

# TRACEROUTE CHECK
echo "\033[43;30m TRACEROUTE CHECK ............................................//\033[0m"
traceroute 1.1.1.1
echo #
echo #

# TEST DEBIT CONNEXION
# INSTALLATION DE SPEEDTEST-CLI
echo "\033[43;30m TEST DEBIT RESEAU ............................................//\033[0m"
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

if confirm "INSTALLER SPEEDTEST-CLI ?"; then
   apt install speedtest-cli && speedtest-cli
else
    echo #
    echo  "\033[05;41m ---> SPEEDTEST-CLI NE SERA PAS INSTALLÉ <--- \033[0m"
    echo #
    echo  "\033[43;30m ---> LANCEMENT DU TEST DE DEBIT <--- \033[0m"
    speedtest-cli
fi
echo #


echo #
echo "\033[5;44;30m FIN DU CHECK NETWORK ........................................//\033[0m"
echo #
echo #
echo #
echo "\033[43;30m MENU CHECKS...........//\033[0m"

