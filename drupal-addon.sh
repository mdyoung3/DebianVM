#!/bin/bash

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
echo "Beginning Installation of Default Drupal installation and modules"

wget http://ftp.drupal.org/files/projects/drupal-7.3.tar.gz
tar -xzvf drupal-7.3.tar.gz
# Cleanup
rm drupal-7.3.tar.gz
mv drupal-7.3/* $PROJECT_NAME
sudo rm -r drupal-7.3

echo "Drupal has Successfully Installed, beginning drupal addons"

# Drush Time

if drush status; then
  echo "Drush already installed, skipping installation"
  exit
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

echo "Installation Complete, please enjoy your new Drupal installation"
exit
