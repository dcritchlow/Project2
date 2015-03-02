<?php

//echo __FILE__.PHP_EOL;

//$sourceDir = realpath($projectDir.DIRECTORY_SEPARATOR.'..');
//$sourceDir  = $projectDir.DIRECTORY_SEPARATOR.'src';
//$configDir  = $sourceDir.DIRECTORY_SEPARATOR.'Config';
//
//echo getcwd().PHP_EOL;
//
//$config = include $configDir.DIRECTORY_SEPARATOR.'config.php';

//$config = array();
//$autoloader = new Autoloader($config);


// read environment variable to tell if it is dev or prod and change logging level

require $configDir.DIRECTORY_SEPARATOR.'autoloader.php';
require $configDir.DIRECTORY_SEPARATOR.'config.php';
$autoloader = new Autoloader($config['application']['classes']);
$autoloader->register();
//var_dump($autoloader);