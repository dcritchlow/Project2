<?php

namespace Common\Authentication\Persistence;

use Common\Exception\LoginException;

class InMemory implements AuthInterface
{
    protected $username;
    protected $password;

    public function __construct($username = '', $password = '')
    {
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

        if ($this->username !== 'joe') {
            throw new LoginException('ERROR: Incorrect username');
        }

        if ($this->password !== '1234pass') {
            throw new LoginException('ERROR: Incorrect password');
        }

        return "Welcome ". $this->username . "!";
    }
}