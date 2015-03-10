#!/usr/bin/env bash

# Determine if this machine has already been provisioned
# Basically, run everything after this command once, and only once
if [ -f "/var/vagrant_provision" ]; then
  exit 0
fi

function say {
  printf "\n--------------------------------------------------------\n"
  printf "\t$1"
  printf "\n--------------------------------------------------------\n"
}

# Install Apache
say "Installing Apache and setting it up."
  # Update aptitude library
  apt-get update >/dev/null 2>&1
  # Install apache2
  apt-get install -y apache2 >/dev/null 2>&1
  # Remove /var/www path
  # Symbolic link to /vagrant path
  if ! [ -L /var/www ]; then
    rm -rf /var/www
    ln -fs /vagrant /var/www
  fi
  # Enable mod_rewrite
  a2enmod rewrite >/dev/null 2>&1

say "Installing handy packages"
  apt-get install -y curl git-core ftp unzip imagemagick vim colordiff gettext graphviz nodejs npm >/dev/null 2>&1

say "Installing PHP Modules"
  # Install php 5.6
  add-apt-repository -y ppa:ondrej/php5-5.6
  apt-get update > /dev/null 2>&1
  # Install php5, libapache2-mod-php5, php5-mysql curl php5-curl
  apt-get install -y php5 php5-cli php5-common php5-dev php5-imagick php5-imap php5-gd libapache2-mod-php5 php5-mysql php5-curl php5-sqlite >/dev/null 2>&1

say "Installing Composer"
  curl -sS https://getcomposer.org/installer | php > /dev/null 2>&1
  mv composer.phar /usr/local/bin/composer > /dev/null 2>&1

# Restart Apache
say "Restarting Apache"
  service apache2 restart > /dev/null 2>&1

say "Changing start directory for Terminal to shared vagrant directory"
  echo 'cd /vagrant' >> ~/.bashrc > /dev/null 2>&1

# Let this script know not to run again
touch /var/vagrant_provision
