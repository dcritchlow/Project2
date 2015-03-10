#!/usr/bin/env bash
function say {
  printf "\n--------------------------------------------------------\n"
  printf "\t$1"
  printf "\n--------------------------------------------------------\n"
}

say "Copying default.vhost file to \n/etc/apache2/sites-available/default.conf"
	cp /vagrant/default.vhost /etc/apache2/sites-available/default.conf >/dev/null 2>&1

say "Adding the new site"
	a2ensite default.conf >/dev/null 2>&1

say "Removing default site"
	a2dissite 000-default.conf >/dev/null 2>&1

say "Reloading apache"
	service apache2 reload >/dev/null 2>&1
