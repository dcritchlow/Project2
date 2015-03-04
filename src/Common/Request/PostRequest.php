<?php
namespace Common\Request;

use Common\Exception\LoginException;

class PostRequest implements RequestInterface
{
    private $username;
    private $password;
    private $authmethod;

    public function __construct($postArray)
    {
        if(!isset($postArray['username'])) {
            throw new LoginException('ERROR: no username dependency in '.__METHOD__.' on line '.__LINE__);
        }

        if(!isset($postArray['password'])) {
            throw new LoginException('ERROR: no password dependency in '.__METHOD__.' on line '.__LINE__);
        }

        if (!is_string($postArray['username'])) {
            throw new LoginException('ERROR: username must be a string '.__METHOD__.' on line '.__LINE__);
        }

        if (!is_string($postArray['password'])) {
            throw new LoginException('ERROR: password must be a string '.__METHOD__.' on line '.__LINE__);
        }

        if (strlen($postArray['password']) < 8) {
            throw new LoginException('ERROR: password must be 8 characters '.__METHOD__.' on line '.__LINE__);
        }
        if (strlen($postArray['password']) > 8) {
            throw new LoginException('ERROR: password must be 8 characters '.__METHOD__.' on line '.__LINE__);
        }
        if (!isset($postArray['auth'])){
            throw new LoginException('ERROR: authentication method was not chosen '.__METHOD__.' on line '.__LINE__);
        }

        $postArray['username'] = htmlentities($postArray['username']);
        $postArray['password'] = htmlentities($postArray['password']);
        $postArray['auth'] = htmlentities($postArray['auth']);

        $this->username = $postArray['username'];
        $this->password = $postArray['password'];
        $this->authmethod = $postArray['auth'];
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAuthMethod()
    {
        return $this->authmethod;
    }
}