Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/trusty32"
  config.vm.hostname = "proj2"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network :private_network, ip: "192.168.33.12"
  # using forwarded port
  # config.vm.network :forwarded_port, host: 8888, guest: 80

  #Provision script - run once
  config.vm.provision "shell", path: "provision.sh"

  # Copy the vhost file to default and reload apache - run every vagrant up
  config.vm.provision "shell", path: "apache.sh"


  # config.vm.provision :shell, path: "provision.sh"
end
