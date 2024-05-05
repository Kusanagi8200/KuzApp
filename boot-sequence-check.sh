
#!/bin/bash

# This program is free software : you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

# This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

echo # 
echo # 
echo "\033[44;30m CHECK BOOT SEQUENCE / LINUX ................................//\033[0m"

if [ `whoami` != "root" ]
then
        echo -e "\033[5;41;30m---> ATTENTION. VOUS DEVEZ AVOIR LES DROITS SUDO POUR LANCER CE SCRIPT \033[0m"
        exit 1
fi
echo # 

echo # 
echo "\033[43;30m VERIFICATION DE L'ÉTAT DU SYSTÈME .......................................//\033[0m"

check_system_state()  {
  state=$(systemctl is-system-running)
  case $state in
    "running")
      echo "\033[1;32;40m SYSTEME EN COURS D'EXECUTION - FONCTIONNEMENT NORMAL \033[0m";;
    "degraded")
      echo "\033[41;97m SYSTEME EN COURS D'EXECUTION - CERTAINES RESSOURCES EN PANNE OU MAUVAIS FONCTIONNEMENT \033[0m";;
    "maintenance")
      echo "\033[41;97m SYSTEME EN COURS D'EXECUTION - MODE MAINTENANCE - FONCTIONNEMENT DEGRADÉ  \033[0m";;
    "starting")
      echo "\033[48;5;208m\033[38;5;15m SYSTEME EN COURS DE DEMARRAGE - PAS ENCORE COMPLETEMENT FONCTIONNEL \033[0m";;
    "stopping")
      echo "\033[48;5;208m\033[38;5;15m SYSTEME EN COURS D'ARRET - CERTAINES TÂCHES EN COURS D'EXECUTION \033[0m";;
    "*")
      echo "\033[1m;43;30m IMPOSSIBLE DE DETERMINER L'ÉTAT DU SYSTEME \033[0m";;
  esac
}
check_system_state

echo #

echo # 
echo "\033[43;30m INFORMATIONS SYSTEME .......................................//\033[0m"
cat /proc/version
echo #

cat /etc/os-release
echo #

echo #
echo "\033[43;30m TEMPS DE DÉMARRAGE SYSTEME .................................//\033[0m"
systemd-analyze time
echo # 

echo #
echo "\033[43;30m TEMPS DE DÉMARRAGE PAR UNITÉS ..........................//\033[0m"
systemd-analyze critical-chain
echo # 

echo #
echo "\033[43;30m UNITÉS NON DÉMARRÉES AU BOOT .......................................//\033[0m"
systemctl --failed 
echo #

echo #
echo "\033[43;30m LISTE DES SERVICES DÉMARRÉS ................................//\033[0m"
service --status-all |grep -Ev "-"
echo #

echo #
echo "\033[43;30m LISTE DES UNITÉS DÉMARRÉES ................................//\033[0m"
systemctl list-units --type=service --state=running | grep -v "\-.slice"
echo #

echo #
echo "\033[43;30m LISTE DES SERVICES ETEINS ..................................//\033[0m"
service --status-all |grep -E " - "
echo #

echo #
echo "\033[43;30m LISTE DES UNITÉS ÉTEINTES ................................//\033[0m"
systemctl list-units --type=service --state=inactive | grep -v "\-.slice"
echo #

echo #
echo "\033[43;30m TEST CONNEXION RÉSEAU ......................................//\033[0m"
ping -v -c 4 1.1.1.1
echo #

echo #
echo "\033[5;44;30m FIN DU CHECK BOOT SEQUENCE .................................//\033[0m"
echo #

echo #
echo #
echo "\033[43;30m MENU CHECKS...........//\033[0m"