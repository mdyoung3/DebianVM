#!/bin/bash
DATE=$(date +%s)

## Check for Database backup folder

if [ ! -d "/vagrant/Backups" ]; then
  echo "Directory doesn't exist, making Backups Folder"
  mkdir /vagrant/Backups
fi

## Check for Database installation

echo "Please Enter in your database password for the root user"
read PASSWORD

if [ ! mysqladmin -u root password '$PASSWORD']; then
  echo "Database not found, exiting script"
  exit
else
echo "Database found! Beginning Copy"
fi

## Backup all current Databases
mysqldump --all-databases > /vagrant/Backups/${DATE}-dbbackup.sql 
## Verify file is saved in correct folder 
