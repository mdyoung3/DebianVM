#!/bin/bash

sudo rm /etc/apt/sources.list

touch /etc/apt/sources.list

printf "deb http://mirrors.kernel.org/debian wheezy main\n" >> /etc/apt/sources.list
printf "deb-src http://mirrors.kernel.org/debian wheezy main\n" >> /etc/apt/sources.list

printf "deb http://security.debian.org/ wheezy/updates main\n" >> /etc/apt/sources.list
printf "deb-src http://security.debian.org/ wheezy/updates main\n" >> /etc/apt/sources.list

# squeeze-updates, previously known as 'volatile'
printf "deb http://mirrors.kernel.org/debian wheezy-updates main\n" >> /etc/apt/sources.list
printf "deb-src http://mirrors.kernel.org/debian wheezy-updates main\n" >> /etc/apt/sources.list


apt-get update
apt-get install --only-upgrade bash

sudo rm /etc/apt/sources.list
touch /etc/apt/sources.list

printf "deb http://mirrors.kernel.org/debian squeeze main\n" >> /etc/apt/sources.list
printf "deb-src http://mirrors.kernel.org/debian squeeze main\n" >> /etc/apt/sources.list

printf "deb http://security.debian.org/ squeeze/updates main\n" >> /etc/apt/sources.list
printf "deb-src http://security.debian.org/ squeeze/updates main\n" >> /etc/apt/sources.list

# squeeze-updates, previously known as 'volatile'
printf "deb http://mirrors.kernel.org/debian squeeze-updates main\n" >> /etc/apt/sources.list
printf "deb-src http://mirrors.kernel.org/debian squeeze-updates main\n" >> /etc/apt/sources.list
