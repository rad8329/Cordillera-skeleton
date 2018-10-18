# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version #
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = "ubuntu/trusty64"
    config.vm.hostname = "cordillera-samplebox"

    # Forward ports for servers #
    config.vm.network "forwarded_port", guest: 80, host: 8788 #Apache
    config.vm.network "forwarded_port", guest: 3306, host: 8789 #MySQL
    
    config.vm.synced_folder './', '/cordillera', owner: 'vagrant', group: 'vagrant'
    config.vm.synced_folder "./", "/var/www/html", owner: "vagrant", group: "vagrant"

    config.vm.provision "shell", path: "provision.sh"

    config.vm.provider "virtualbox" do |vb|
      vb.name = 'cordillera-samplebox'
      # Don't boot with headless mode #
      #vb.gui = true
  
      # Use VBoxManage to customize the VM. For example to change memory: #
      vb.customize ["modifyvm", :id, "--memory", "512"]
    end
end
