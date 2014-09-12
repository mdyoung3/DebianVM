# -*- mode: ruby -*-
# vi: set ft=ruby :
#Comment
# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "chef/debian-6.0.8"
  config.vm.provision :shell, path: "bootstrap.sh"
  config.vm.network :forwarded_port, host: 4567, guest: 80
  config.ssh.forward_agent = true
  config.vm.provider "virtualbox" do |v| 
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"] 
    v.customize ["modifyvm", :id, "--natdnsproxy1", "on"] 
  end
end
