#!/bin/bash

# This program is free software : you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

# This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY.

echo #
echo -e "\033[38;5;214m█▄▀ █ █ ▀█▀ ▄▀▄ █▀▄ █▀▄ | Made by Kusanagi8200 - 2024\033[0m"
echo -e "\033[38;5;214m█ █ ▀▄█ █▄▄ █▀█ █▀  █▀  | https://github.com/Kusanagi8200\033[0m"
echo -e "\033[43;30m Bash Script Collection for Linux Administration Systems \033[0m"

if [ `whoami` != "root" ]
then
        echo -e "\033[5;41;30mATTENTION. VOUS DEVEZ AVOIR LES DROITS SUDO POUR LANCER CE SCRIPT \033[0m"
        exit 1
fi

echo #
##
# Color  Variables
##

green='\033[43;30m'
red='\033[41;30m'
clear='\e[0m'

##
# Color Functions
##

ColorGreen(){
	echo -ne $green$1$clear
}
ColorRed(){
	echo -ne $red$1$clear
}

echo -e "\033[43;30m MENU .....//\033[0m"

menu(){
echo -ne "
$(ColorGreen ' 01 --> ') $(ColorGreen 'UPDATE-SCRIPT ..............//__________________')

$(ColorGreen ' 02 --> ') $(ColorGreen 'UPDATE-SCRIPT-FAST .........//__________________')

$(ColorGreen ' 03 --> ') $(ColorGreen 'UPDATE-SCRIPT-VM ...........//__________________')

$(ColorGreen ' 04 --> ') $(ColorGreen 'UPDATE-SCRIPT-ENG ..........//__________________')

$(ColorGreen ' 05 --> ') $(ColorGreen 'UPDATE-SCRIPT-FAST-ENG .....//__________________')

$(ColorGreen ' 06 --> ') $(ColorGreen 'BOOT-SEQUENCE-CHECK ........//__________________')

$(ColorGreen ' 07 --> ') $(ColorGreen 'CHECK-NETWORK ..............//__________________')

$(ColorGreen ' 08 --> ') $(ColorGreen 'HARDWARE-INFOS .............//__________________')

$(ColorGreen ' 09 --> ') $(ColorGreen 'SYSTEM-INFOS ...............//__________________')

$(ColorGreen ' 10 --> ') $(ColorGreen 'UPDATE-NOCOLORS ............//__________________')

$(ColorRed   ' 00 --> ') $(ColorRed   'EXIT .......................//__________________')

$(ColorGreen ' SCRIPT NUMBER ......................// = ') "
        read a
        case $a in
01) sh update-script.sh ; menu ;;
02) sh update-script-fast.sh ; menu ;;
03) sh update-script-vm.sh ; menu ;;
04) sh update-script.eng.sh ; menu ;;
05) sh update-script-fast.eng.sh ; menu ;;
06) sh boot-sequence-check.sh ; menu ;;
07) sh check-network.sh ; menu ;;
08) sh hardware-infos.sh ; menu ;;
09) sh system-infos.sh ; menu ;;
10) sh update-nocolors.sh ; menu ;;
00)
   ps aux | grep 'gnome-terminal' | grep -v grep | awk '{print $2}' | xargs kill
            exit 0
            ;;

*) echo -e $(ColorRed 'MAUVAIS CHOIX .........................................//')
        esac
}

# Call the menu function
menu
