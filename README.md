DebianVM
========

Vagrant Dev VM

This is a simple DevVM verison with Deviant 6.0.8 (Squeezy)

Added into this environment is MySQL, PHP, Apache, PhpmyAdmin, Vim, Curl, Git, and debconf tools. Highly recommend to change the password after starting up the VM.

Requires Vagrant and Git to run, so make sure to install these things.

General commands are:
Run Git Bash as Admin

Mkdir newProject
cd newProject
vagrant init
git init
git clone https://github.com:The-Outrider/DebianVM.git
vagrant up
(wait)
vagrant ssh

DONE! You have a fully working Debian VM with PHP, MySQL, and Git!
