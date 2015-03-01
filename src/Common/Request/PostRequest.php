<?php
namespace Common\Request;
//use \Common\Request\RequestInterface;

class PostRequest implements RequestInterface
{
    private $username;
    private $password;

    public function __construct($postArray)
    {
        if(!isset($postArray['username'])) {
            throw new InvalidArgumentException(__METHOD__.'('.__LINE__.'): ERROR: no username dependency');
        }

        if(!isset($postArray['password'])) {
            throw new InvalidArgumentException(__METHOD__.'('.__LINE__.'): ERROR: no password dependency');
        }

        if (!is_string($postArray['username'])) {
            throw new HttpInvalidParamException(__METHOD__.'('.__LINE__.'): ERROR: username must be a string');
        }

        if (!is_string($postArray['password'])) {
            throw new HttpInvalidParamException(__METHOD__.'('.__LINE__.'): ERROR: password must be a string');
        }

        if (!strlen($postArray['password']) < 8) {
            throw new HttpInvalidParamException(__METHOD__.'('.__LINE__.'): ERROR: password must be a 8 characters');
        }

        $postArray['username'] = htmlentities($postArray['username']);
        $postArray['password'] = htmlentities($postArray['password']);

        $this->username = $postArray['username'];
        $this->password = $postArray['password'];
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
}