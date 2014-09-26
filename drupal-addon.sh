#!/bin/bash
###Creating Aliases
alias home="cd /vagrant"
alias drupal="cd /vagrant/drupal*"

home

## Installing Drupal
echo 'What would you like to call your new project'
read PROJECT_NAME

if test -d "$PROJECT_NAME"; then
  while test -d "$PROJECT_NAME"; do
        echo
        echo "Project Name $project_name rejected"
        echo "What would you like to call your new project?"
        read PROJECT_NAME
  done
  mkdir $PROJECT_NAME
else
  mkdir $PROJECT_NAME
fi
echo "Project Name: $PROJECT_NAME accepted"

##First need to install Drush

if drush status; then
  echo "Drush already installed, skipping installation"
else
  if pear version; then
    echo "Pear already installed"
  else
    sudo apt-get install php-pear
    sudo pear channel-discover pear.drush.org
    sudo pear install drush/drush
    sudo pear install Console_Table-1.2.0
  fi
fi


echo "Beginning Installation of Default Drupal installation and modules"

drush dl drupal

##Find Drupal folder
drupal
DRUPAL=$(pwd)
home
# Cleanup
mkdir $DRUPAL/sites/default/files
chmod 777 $DRUPAL/sites/default/files
cp $DRUPAL/sites/default/default.settings.php $DRUPAL/sites/default/settings.php
mv $DRUPAL/* $PROJECT_NAME
mv $PROJECT_NAME projects
echo "Moved $PROJECT_NAME into your projects folder"
sudo rm -r $DRUPAL
DATABASE_NAME="$PROJECT_NAME.dev
mysql CREATE DATABASE $DATABASE_NAME
drush site-install standard --db-url=mysql://[root]:[oked_dev]@localhost/[$DATABASE_NAME] --site-name=$PROJECT_NAME
echo "Drupal has Successfully Installed, beginning drupal addons"
echo "Installation Complete, please enjoy your new Drupal installation"
exit
