#!/bin/bash
pause() {
   read -r -p "$*" key
}

pause 'Press [Enter] key to continue after checking that the "site is working" page is up and running...'

echo  "what is the name of your site?" 
read domain_name

echo "Please wait while Drupal is downloading..."

alias vagrant_home="cd /vagrant/"
vagrant_home

drush dl drupal

echo "Download finished."

rm -r /vagrant/$domain_name.dev
mv /vagrant/drupal-7.* /vagrant/$domain_name.dev

alias site_home="cd /vagrant/$domain_name.dev"
site_home 

echo "What is your database user name?"
read db_un

echo "What is your database password?"
read db_pw



#pause 'Press [Enter] key to continue...'

#create up database

mysqladmin -u $db_un -p$db_pw create dev_$domain_name


echo "please enter your port"

read user_port

echo "please enter the password you want to use for the drupal development site"

read drupal_password

drush si --db-url=mysql://$db_un:$db_pw@localhost:$user_port/dev_$domain_name --account-name=ovprea --account-pass=$drupal_password  --site-name=$domain_name