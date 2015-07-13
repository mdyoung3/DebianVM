#!/bin/bash
#a script to create a new vhost

alias home="cd /vagrant"
home
echo 'What is the name of the site?'
read domain_name
case "$domain_name" in  
    *\ * )
	echo "Invalid name. Please use a machine readable name. E.g., foo_bar instead of foo bar. Please start over."
exit
	;;
       *)
        echo "the domain of your site is going to be $domain_name.dev"
        ;;
esac 
# mkdir $domain_name
alias vhost_home = "cd /home"
vhost_home
# cp default $domain_name.conf










#        echo "What is the name of the new site?"

	
# while "$NAME"; do
 #       echo "Domain Name $NAME rejected"
 #       echo "Invalid name. Please use a machine readable name. E.g., foo_bar instead of foo bar."
#        echo "What is the name of the new site?"
 #       read NAME
# done
  #        ;;
    #   *)
    #       echo "the domain of your site is going to be $NAME.dev"
  #        ;;
#Sesac 

