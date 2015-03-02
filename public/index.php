<?php
	$projectDir = dirname(__FILE__);
	$projectDir = realpath($projectDir.DIRECTORY_SEPARATOR.'..');
	$sourceDir  = realpath($projectDir.DIRECTORY_SEPARATOR.'src');
	$configDir  = realpath($sourceDir.DIRECTORY_SEPARATOR.'Config');

    // Configure/bootstrap application
	require $configDir.DIRECTORY_SEPARATOR.'bootstrap.php';

    // Load and launch the actual application
    require $sourceDir.DIRECTORY_SEPARATOR.'app.php';