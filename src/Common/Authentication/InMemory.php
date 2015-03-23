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

        $users = [
            new User('joe', '1234pass'),
            new User('tyler', '123456'),
            new User('brody','654321')
        ];

        foreach($users as $user)
        {
            if ($this->username === $user->getUserName() && $this->password === $user->getPassword()) {
                return new Welcome();
            }
        }

        return new NotAuthorized();
    }
}