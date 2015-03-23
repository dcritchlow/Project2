<?php

namespace Common\Authentication;

use Views\Error;
use Views\NotAuthorized;
use Views\Welcome;

class FileBased implements IAuthentication
{

    protected $username;
    protected $password;

    public function __construct($config=[], $username = '', $password = '')
    {
        $this->config = $config;

        if(empty($this->config))
        {
            throw new \InvalidArgumentException(
                __METHOD__.': $config cannot be empty'
            );
        }

        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate($username, $password)
    {
        if ($username !== '') {
            $this->username = $username;
        }

        if ($password !== '') {
            $this->password = $password;
        }

        $file = $this->config['app']['userFile'];

        $users = file($file);

        foreach($users as $value)
        {
            $line = explode(',', trim($value));
            $user = new User($line[0], $line[1]);

            if ($this->username === $user->getUserName() && $this->password === $user->getPassword())
            {
                return new Welcome();
            }
        }
        return new NotAuthorized();
    }
}