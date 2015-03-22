<?php

// Load server specific configuration data.  Should
// check an environment variable load the appropriate
// server configuration file.
require 'config.php';

// Load database connection information
//$dbMySQL = new PDO($config['app']['db']['mysql']);
//$dbSqlite = new PDO('sqlite:'.$config['app']['db']['sqlite']);
//new PDO('sqlite:'.$sourceDir.'/test.db');

// Load all namespaces based on directory structure
// in the src/ directory.
require 'Autoloader.php';

$loader = new \Autoloader($config['app']['classes']);
$loader->register();
