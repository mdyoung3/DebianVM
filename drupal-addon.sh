!#/bin/bash

## Installing Drupal
cd /vagrant
echo 'What would you like to call your new project'
read PROJECT_NAME
echo 'Project Name: $PROJECT_NAME accepted'
echo 'Beginning Installation of Default Drupal installation and modules'

wget http://ftp.drupal.org/files/projects/drupal-x.x.tar.gz
tar -xzvf drupal-x.x.tar.gz
# Cleanup
rm drupal-7.3.tar.gz
mv drupal-7.3/* $PROJECT_NAME
sudo rm -r drupal-7-3

# Drush Time
sudo pear channel-discover pear.drush.org
sudo pear install drush/drush

cd $PROJECT_NAME
