<?php

    use Common\Exception\LoginException;

	$projectDir = dirname(__FILE__);
	$projectDir = realpath($projectDir.DIRECTORY_SEPARATOR.'..');
	$sourceDir  = realpath($projectDir.DIRECTORY_SEPARATOR.'src');
	$configDir  = realpath($sourceDir.DIRECTORY_SEPARATOR.'Config');

    // Configure/bootstrap application
	require $configDir.DIRECTORY_SEPARATOR.'bootstrap.php';

    if($_SERVER["REQUEST_URI"])
    {
        $url = 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        $url_array = parse_url($url);
    }

    if(preg_match('/auth/', $url_array['path']))
    {
        try
        {
            require $sourceDir.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'auth.php';
            require $sourceDir.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'welcome.php';
        }
        catch(LoginException $ex)
        {
            echo '<div class="error">'.$ex->getMessage().'</div>';
            require $sourceDir.DIRECTORY_SEPARATOR.'app.php';
        }
        return;
    }

    require $sourceDir.DIRECTORY_SEPARATOR.'app.php';