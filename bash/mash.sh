#!/bin/bash

read -ps "what is the name of your site?" domain_name



#drush dl drupal
#rm -r /vagrant/$domain_name.dev
#mv /vagrant/drupal-7.* /vagrant/$domain_name.dev

#alias site_home="cd /vagrant/$domain_name.dev"
#site_home 

echo "What is your database user name?"
read db_un

echo "What is your database password?"
read -s db_pw

echo "please enter your port"
read user_port

echo "please enter the password you want to use for the drupal development site"
read -s drupal_password

#pause 'Press [Enter] key to continue...'

#create up database
#mysql

mysqladmin -u $db_un -p$db_pw dev_$domain_name

drush si --db-url=mysql://$db_un:$db_pw@localhost:$user_port/dev_$domain_name --account-name=ovprea --account-pass=$drupal_password  --site-name=$