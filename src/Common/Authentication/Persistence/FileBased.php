<?php

namespace Common\Authentication\Persistence;

use Common\Exception\LoginException;

class FileBased implements AuthInterface
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

        $file = realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'../../..'.DIRECTORY_SEPARATOR.'user.txt');
        $userFile = file_get_contents($file);
        $user = explode(',',$userFile);

        if ($this->username !== $user[0]) {
            throw new LoginException('ERROR: Incorrect username');
        }

        if ($this->password !== $user[1]) {
            throw new LoginException('ERROR: Incorrect password');
        }

        return "Welcome ". $this->username . "!";
    }
}