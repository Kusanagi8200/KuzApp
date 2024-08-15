#!/bin/bash

# This program is free software : you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

# This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

echo
echo
echo "CHECK BOOT SEQUENCE / LINUX ................................//"

echo
echo "VERIFICATION DE L'ETAT DU SYSTEME .......................................//"

check_system_state()  {
  state=$(systemctl is-system-running)
  case $state in
    "running")
      echo "SYSTEME EN COURS D'EXECUTION - FONCTIONNEMENT NORMAL";;
    "degraded")
      echo "SYSTEME EN COURS D'EXECUTION - CERTAINES RESSOURCES EN PANNE OU MAUVAIS FONCTIONNEMENT";;
    "maintenance")
      echo "SYSTEME EN COURS D'EXECUTION - MODE MAINTENANCE - FONCTIONNEMENT DEGRADE";;
    "starting")
      echo "SYSTEME EN COURS DE DEMARRAGE - PAS ENCORE COMPLETEMENT FONCTIONNEL";;
    "stopping")
      echo "SYSTEME EN COURS D'ARRET - CERTAINES TACHES EN COURS D'EXECUTION";;
    "*")
      echo "IMPOSSIBLE DE DETERMINER L'ETAT DU SYSTEME";;
  esac
}
check_system_state

echo

echo
echo "INFORMATIONS SYSTEME .......................................//"
cat /proc/version
echo

cat /etc/os-release
echo

echo
echo "TEMPS DE DEMARRAGE SYSTEME .................................//"
systemd-analyze time
echo

echo
echo "TEMPS DE DEMARRAGE PAR UNITES ..........................//"
systemd-analyze critical-chain
echo

echo
echo "UNITES NON DEMARREES AU BOOT .......................................//"
systemctl --failed
echo

echo
echo "LISTE DES SERVICES DEMARRES ................................//"
service --status-all | grep -Ev "-"
echo

echo
echo "LISTE DES UNITES DEMARREES ................................//"
systemctl list-units --type=service --state=running | grep -v "\-.slice"
echo

echo
echo "LISTE DES SERVICES ETEINS ..................................//"
service --status-all | grep -E " - "
echo

echo
echo "LISTE DES UNITES ETEINTES ................................//"
systemctl list-units --type=service --state=inactive | grep -v "\-.slice"
echo

echo
echo "TEST CONNEXION RESEAU ......................................//"
ping -v -c 4 1.1.1.1
echo

echo
echo "FIN DU CHECK BOOT SEQUENCE .................................//"
echo

echo
echo
echo "MENU CHECKS...........//"
