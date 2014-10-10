#!/bin/bash
#Backup current sources list
sudo cp /etc/apt/sources.list /etc/apt/sources.list.old
#Briefly add new sources list to get patch

sudo cp /vagrant/Patches/security.list /etc/apt/sources.list

#Execute the patch update for bash
sudo apt-get update
sudo apt-get install --only-upgrade bash

#Get back the normal sources list.
sudo cp /etc/apt/sources.list.old /etc/apt/sources.list

