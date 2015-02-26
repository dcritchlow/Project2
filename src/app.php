<?php

echo __FILE__.PHP_EOL;
echo __NAMESPACE__.PHP_EOL;

// Load server specific configuration data.  Should
// check an environment variable load the appropiate
// server configuration file.
require 'Config'.DIRECTORY_SEPARATOR.'dev.php';

// Load dependencies here, if needed now.
require 'Common'.DIRECTORY_SEPARATOR.'Authentication'.DIRECTORY_SEPARATOR.'AuthInterface.php';
require 'Common'.DIRECTORY_SEPARATOR.'Authentication'.DIRECTORY_SEPARATOR.'FileBased.php';
require 'Common'.DIRECTORY_SEPARATOR.'Authentication'.DIRECTORY_SEPARATOR.'InMemory.php';

// Display the login form.
require 'Views'.DIRECTORY_SEPARATOR.'login.php';
