<?php
//use Common\Request\PostRequest;

use Common\Request\PostRequest;

echo __NAMESPACE__.PHP_EOL;
echo __FILE__.PHP_EOL;

var_dump($_POST);

try {
    $postRequest = new PostRequest($_POST);
}
catch (Exception $ex){
    echo $ex->getMessage();
}

//echo $postRequest->getUserName(). " " . $postRequest->getPassword().PHP_EOL;