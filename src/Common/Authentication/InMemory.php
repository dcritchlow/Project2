<?php

namespace Common\Authentication;

use Views\NotAuthorized;
use Views\Welcome;

class InMemory implements IAuthentication
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
            return new NotAuthorized();
        }

        if ($this->password !== '1234pass') {
            return new NotAuthorized();
        }

        return new Welcome();
    }
}