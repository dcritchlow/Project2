<?php

namespace Common\Authentication\Persistence;

interface AuthInterface
{
    public function authenticate($username, $password);
}