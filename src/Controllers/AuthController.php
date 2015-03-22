<?php
/**
 * File name: AuthController.php
 *
 * Project: Project2
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;
use Common\Authentication\PersistenceFactory;
use Common\Exceptions\LoginException;
use Views\Error;


/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * Function execute
     *
     * @access public
     */
    public function action()
    {
        $postData = $this->request->getPost();

        $persistence = new PersistenceFactory();

        if ($postData->auth == 'in-memory')
        {
            $auth = $persistence->createInMemoryPersistence();
        }

        if ($postData->auth == 'file-based')
        {
            $auth = $persistence->createFileBasedPersistence();
        }

        if ($postData->auth == 'sqlite')
        {
            $auth = $persistence->createSqlitePersistence($this->config);
        }

        if ($postData->auth == 'mysql')
        {
            $auth = $persistence->createMySQLPersistence($this->config);
        }

        try{
            $view = $auth->authenticate($postData->username, $postData->password);
            $view->show();
        }
        catch(LoginException $ex){
            $view = new Error($ex->getMessage());
            $view->show();
        }


    }
}
