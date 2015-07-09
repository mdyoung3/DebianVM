#!/bin/bash
#a script to create a new vhost

#Gets domain name from user
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
mkdir /vagrant/$domain_name.dev
touch /vagrant/$domain_name.dev/index.html
echo "Site is up and running" > /vagrant/$domain_name.dev/index.html
echo "A new directory called $domain_name.dev was created for your site files."

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

echo "To access the host file on a Mac, use the following command in terminal"
echo "sudo vim /etc/host"
echo " "
echo "In the host file, please insert the ip address with the domain name."
echo "For example, 127.0.01 test.dev"
echo " "
echo "Please visit $domain_name.dev:[port] to ensure site is working. "

