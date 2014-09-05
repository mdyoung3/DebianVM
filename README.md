DebianVM
========

Vagrant Dev VM (codename Deviant)

This is a simple DevVM verison with Debian 6.0.8 (Squeezy)

Added into this environment is MySQL, PHP, Apache, PhpmyAdmin, Vim, Curl, Git, and debconf tools. Highly recommend to change the password after starting up the VM.

Requires Vagrant, Git, and VirtualBox 4.3.12 (for Windows 7, maybe 8 also) to run, so make sure to install these things.

http://www.vagrantup.com/downloads <br />
http://git-scm.com/downloads <br />
https://www.virtualbox.org/wiki/Download_Old_Builds_4_3 <br />

General commands are:
Run Git Bash as Admin

Mkdir [Project Name Here] <br />
cd [Project Name Here] <br />
vagrant init <br />
git init <br />
git clone git@github.com/The-Outrider/DebianVM.git <br />
git remote add origin https://github.com/The-Outrider/DebianVM.git <br />
rm VagrantFile <br />
git pull origin master <br />
vagrant up <br />
(wait) <br />
vagrant ssh <br />
<br />
DONE! You have a fully working Debian VM with PHP, MySQL, and Git! <br  />
<br  />
After initial installation: <br  />
cd [Project Name Here] <br  />
vagrant up <br  />
vagrant ssh <br  />
