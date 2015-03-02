<?php
namespace Common\Authentication\Request;

//use \Common\Authentication\Request\RequestInterface;
//use HttpInvalidParamException;
//use InvalidArgumentException;

echo __FILE__.PHP_EOL;

class PostRequest
{
    private $username;
    private $password;
    private $authmethod;

    public function __construct($postArray)
    {
        if(!isset($postArray['username'])) {
//            throw new InvalidArgumentException(__METHOD__.'('.__LINE__.'): ERROR: no username dependency');
        }

        if(!isset($postArray['password'])) {
//            throw new InvalidArgumentException(__METHOD__.'('.__LINE__.'): ERROR: no password dependency');
        }

        if (!is_string($postArray['username'])) {
//            throw new HttpInvalidParamException(__METHOD__.'('.__LINE__.'): ERROR: username must be a string');
        }

        if (!is_string($postArray['password'])) {
//            throw new HttpInvalidParamException(__METHOD__.'('.__LINE__.'): ERROR: password must be a string');
        }

        if (!strlen($postArray['password']) < 8) {
//            throw new HttpInvalidParamException(__METHOD__.'('.__LINE__.'): ERROR: password must be a 8 characters');
        }
        if (!isset($postArray['auth'])){
//            throw new InvalidArgumentException(__METHOD__.'('.__LINE__.'): ERROR: no authentication method');
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