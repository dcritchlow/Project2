<?php

use \Common\Authentication\Request\PostRequest;
use \Common\Authentication\PersistenceFactory;

$projectDir = dirname(__FILE__);
$projectDir = realpath($projectDir.DIRECTORY_SEPARATOR.'..');
$sourceDir  = realpath($projectDir.DIRECTORY_SEPARATOR.'src');
//echo $sourceDir;
require $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.'Request'.DIRECTORY_SEPARATOR.'PostRequest.php';
require $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.'Authentication'.DIRECTORY_SEPARATOR.'FactoryInterface.php';
require $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.'Authentication'.DIRECTORY_SEPARATOR.'PersistenceFactory.php';
require $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.'Authentication'.DIRECTORY_SEPARATOR.'Persistence'.
    DIRECTORY_SEPARATOR.'AuthInterface.php';
require $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.'Authentication'.DIRECTORY_SEPARATOR.'Persistence'.
    DIRECTORY_SEPARATOR.'InMemory.php';
require $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.'Authentication'.DIRECTORY_SEPARATOR.'Persistence'.
    DIRECTORY_SEPARATOR.'FileBased.php';

//var_dump($_POST);

try {
    $postRequest = new PostRequest($_POST);
    $persistence = new PersistenceFactory();
    $authmethod = $postRequest->getAuthMethod();

    echo $authmethod;

    if($authmethod == 'in-memory'){
        $authenticate = $persistence->createInMemoryPersistence();
    }
    if($authmethod == 'file-based'){
        $authenticate = $persistence->createFileBasedPersistence();
    }


    $response = $authenticate->authenticate($postRequest->getUserName(), $postRequest->getPassword());

    echo "<h1>".$response."</h1>";
}
catch (Exception $ex){
    echo $ex->getMessage();
}

//echo $postRequest->getUserName(). " " . $postRequest->getPassword().PHP_EOL;