<?php
namespace Views;

use Common\Exception\LoginException;
use Common\Request\PostRequest;
use Common\Authentication\PersistenceFactory;

try
{
    $postRequest = new PostRequest($_POST);
    $persistence = new PersistenceFactory();
    $authmethod = $postRequest->getAuthMethod();

    echo '<span>'.$authmethod.'</span>';

    if($authmethod == 'in-memory'){
        $authenticate = $persistence->createInMemoryPersistence();
    }
    if($authmethod == 'file-based'){
        $authenticate = $persistence->createFileBasedPersistence();
    }
    if($authmethod == 'mysql'){
        $authenticate = $persistence->createMySQLPersistence($db);
    }
    if($authmethod == 'sqlite'){
        $authenticate = $persistence->createSqlitePersistence($dbSqlite);
    }


    $response = $authenticate->authenticate($postRequest->getUserName(), $postRequest->getPassword());

    echo "<h1>".$response."</h1>";

}
catch (LoginException $ex)
{
    throw $ex;
}