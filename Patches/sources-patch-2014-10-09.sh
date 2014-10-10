#!/bin/bash

#Simple update to your sources list
#First Backup Old sources

sudo cp /etc/apt/sources.list /vagrant/Patches/sources.list.old

#And Install new list

sudo cp /vagrant/Patches/sources.list.new /etc/apt/sources.list

echo "New sources file installed"
