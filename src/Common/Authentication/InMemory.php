<?php
use Common\Authentication\AuthInterface;

echo __FILE__.PHP_EOL;

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

        return "Welcome!";
    }
}