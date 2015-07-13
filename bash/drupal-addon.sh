#!/bin/bash
###Creating Aliases
#Gets domain name from user

pause() {
   read -r -p "$*" key
}


alias home="cd /etc/apache2/sites-available"
home
echo 'What is the name of the site?'
read domain_name

case "$domain_name" in  
    *\ * )
		echo "Invalid name. Please use a machine readable name. E.g., foo_bar instead of foo bar. Please start over."
		exit
	;;
	*)
        echo "the domain name of your site is going to be $domain_name.dev"
    ;;
esac 

pause "Please press [Enter] to continue..."

if test -d "/vagrant/$domain_name.dev"; then
  while test -d "/vagrant/$domain_name.dev"; do
        echo
        echo "Project Name $domain_name rejected"
        echo "What would you like to call your new project?"
        read PROJECT_NAME
  done
  mkdir /vagrant/$domain_name.dev
  touch /vagrant/$domain_name.dev/index.html
else
  mkdir /vagrant/$domain_name.dev
  touch /vagrant/$domain_name.dev/index.html
fi

mkdir /vagrant/$domain_name.dev
touch /vagrant/$domain_name.dev/index.html
echo "Site is up and running" > /vagrant/$domain_name.dev/index.html
echo "A new directory called $domain_name.dev was created for your site files."

pause "Please press [Enter] to continue..."

#creates and updates new vhost file
sudo cp default $domain_name.conf
sudo sed -i 's/webmaster/root/' $domain_name.conf
sudo sed -i '3i ServerName '$domain_name'.dev' $domain_name.conf
sudo sed -i 's:<Directory />:<Directory /var/www/'$domain_name'.dev/>:' $domain_name.conf
sudo sed -i 's:<Directory /var/www/>:<Directory /var/www/'$domain_name'.dev>:' $domain_name.conf
sudo sed -i 's:DocumentRoot /var/www:DocumentRoot /var/www/'$domain_name'.dev:' $domain_name.conf

#restarts server
sudo a2ensite $domain_name.conf
sudo service apache2 restart
echo "Vhost setup complete. Please be sure to point your host file to the domain as well."
echo "To access host file in Windows: C:\Windows\System32\etc\host"
echo " "
echo "For more information: http://www.rackspace.com/knowledge_center/article/how-do-i-modify-my-hosts-file"
echo ""
echo "To access the host file on a Mac, use the following command in terminal"
echo "sudo vim /etc/host"
echo " "
echo "In the host file, please insert the ip address with the domain name."
echo "For example, 127.0.01 test.dev"
echo " "
echo "Please visit $domain_name.dev:[port] to ensure site is working. "

pause 'Press [Enter] key to continue after checking that the "site is working" page is up and running. Be sure to edit your host file...'

alias vagrant_home="cd /vagrant"
vagrant_home
echo "Project Name: $domain_name accepted"
echo "Beginning Installation of Default Drupal installation and modules"

# Drush Time
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


pause "Press [Enter] to begin the install of Drupal."

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

#create a database

mysqladmin -u $db_un -p$db_pw create dev_$domain_name

echo "please enter your port"
read user_port

echo "please enter the password you want to use for the drupal development site"
read drupal_password

drush si --db-url=mysql://$db_un:$db_pw@localhost:$user_port/dev_$domain_name --account-name=ovprea --account-pass=$drupal_password  --site-name=$domain_name


echo "Installation Complete, please enjoy your new Drupal installation."
exit
