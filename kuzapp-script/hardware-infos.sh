#!/bin/bash

# This program is free software : you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

# This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

echo # 
echo # 
echo "\033[44;30m CHECK HARDWARE / LINUX .....................................//\033[0m"

if [ `whoami` != "root" ]
then
        echo -e "\033[5;41;30mATTENTION. VOUS DEVEZ AVOIR LES DROITS SUDO POUR LANCER CE SCRIPT \033[0m"
        exit 1
fi
echo #

echo #
echo "\033[43;30m MACHINE ....................................................//\033[0m"
inxi -M
echo #

echo #
echo "\033[43;30m MEMOIRE ....................................................//\033[0m"
inxi -m
echo #

echo #
echo "\033[43;30m CPU ........................................................//\033[0m"
inxi -C
echo #

echo #
echo "\033[43;30m GRAPHICS ...................................................//\033[0m"
inxi -G
echo #

echo #
echo "\033[43;30m NETWORK ....................................................//\033[0m"
inxi -n
echo #

echo #
echo "\033[43;30m DRIVES .....................................................//\033[0m"
inxi -D
echo #

echo #
echo "\033[43;30m PARTITIONS .................................................//\033[0m"
inxi -p
echo #

echo #
echo "\033[43;30m FSTAB ......................................................//\033[0m"
cat /etc/fstab
echo # 

echo #
echo "\033[5;44;30m FIN DU CHECK HARDWARE .....................................//\033[0m"
echo #
echo #
echo #
echo "\033[43;30m MENU CHECKS...........//\033[0m"