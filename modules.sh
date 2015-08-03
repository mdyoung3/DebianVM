#!bin/bash

pause() {
   read -r -p "$*" key
}

echo "Welcome to the fastrack module installation script. This is designed for the speedy installation of Drupal modules. 

NOTE: THIS NEEDS TO BE RUN WITH BASH COMMAND, AND NOT THE SH COMMAND.

Enter the name of the folder the files for the Drupal site."
read folder

if [ ! -d "/vagrant/$folder.dev" ]; then
	echo "This folder does not exist"
	echo "please try again."
	exit
fi

#alias site_home="cd /vagrant/$folder.dev"
#site_home
#echo $site_home

sitehome () {
	cd /vagrant/$folder.dev
}

sitehome

pause 'This script will give you the option to quickly install some commonly implemented modules and themes.

Press Enter to continue.' 

echo 'Do you want to install a theme? (yes/no)'
read theme_ans

if [ "$theme_ans" = 'yes' ]; then
        echo "Choose a theme and type its number:
	1. Boron
	2. bootstrap
	3. Nestor"

	read theme_name

	if [ "$theme_name" = 1 ]; then
		drush dl boron
		drush en boron
		drush vset theme_default boron
	elif [ "$theme_name" = 2 ]; then
		drush dl bootstrap
		drush en bootstrap
		drush vset theme_default boron
	elif [ "$theme_name" = 3 ]; then
		pause "NOTE: You will need to point your local host file to the proper server. To do this, you will need to edit your computer's host file. Learn more: http://www.howtogeek.com/howto/27350/beginner-geek-how-to-edit-your-hosts-filei/

Press Enter to continue..."
		command -v unzip >/dev/null 2>&1 || sudo apt-get install unzip 
		command -v zip >/dev/null 2>&1 || sudo apt-get install zip 
		
 
		wget http://trepo.rtd.asu.edu/nestorDrupal.zip
		
		dl bootstrap
		drush en bootstrap
		drush vset theme_default boron
	fi		

        	
		all_folder () {
			cd /vagrant/$folder.dev/sites/all
		}
		all_folder
		

		wget http://trepo.rtd.asu.edu/nestorDrupal.zip
		echo "Decompressing files. Hold tight."
		unzip -q nestorDrupal.zip
		
		rm nestorDrupal.zip
				
		resync -r  nestorDrupal/Clean\ Installation/modules modules
		resync -r  nestorDrupal/Clean\ Installation/themes  themes 



declare -a modules=( "date" "ctools" "date" "views" "honeypot" )
echo 'You can install the following modules now:'
printf '%s\n' "${modules[@]}"

echo 'Would you like to install the above modules? (yes/no)'
read module_ans

if [ "$module_ans" = 'yes' ]; then
	echo "begining installation process"

	arraylength=${#modules[@]}	

	for (( i=1; i<${arraylength}+1; i++ ));
	do
		drush dl ${modules[i-1]}
		drush en ${modules[i-1]}
	done
fi 
exit

	
