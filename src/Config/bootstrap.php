<?php

// read environment variable to tell if it is dev or prod and change logging level

require $configDir.DIRECTORY_SEPARATOR.'autoloader.php';
require $configDir.DIRECTORY_SEPARATOR.'config.php';
$autoloader = new Autoloader($config['application']['classes']);
$autoloader->register();