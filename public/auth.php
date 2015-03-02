<?php

use Common\Request\PostRequest;

var_dump($_POST);

try {
    $postRequest = new PostRequest($_POST);
}
catch (Exception $ex){
    echo $ex->getMessage();
}

echo $postRequest->getUserName(). " " . $postRequest->getPassword().PHP_EOL;