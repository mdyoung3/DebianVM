#!/bin/bash

## Installing Drupal
cd /vagrant
echo 'What would you like to call your new project'
read project_name

while [cd $project_name]; do
      clear
      echo
      echo "Project Name $project_name rejected"
      echo "What would you like to call your new project?"
      read PROJECT_NAME
done
mkdir $PROJECT_NAME
echo "Project Name: $project_name accepted"
echo "Beginning Installation of Default Drupal installation and modules"

wget http://ftp.drupal.org/files/projects/drupal-7.3.tar.gz
tar -xzvf drupal-7.3.tar.gz
# Cleanup
rm drupal-7.3.tar.gz
mv drupal-7.3/* $project_name
sudo rm -r drupal-7.3

# Drush Time
sudo pear channel-discover pear.drush.org
sudo pear install drush/drush

cd $PROJECT_NAME
