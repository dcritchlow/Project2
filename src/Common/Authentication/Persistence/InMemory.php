<?php

namespace Common\Authentication\Persistence;

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
            return "Not Authorized!";
        }

        if ($this->password !== '1234pass') {
            return "Not Authorized!";
        }

        return "Welcome ". $this->username . "!";
    }
}