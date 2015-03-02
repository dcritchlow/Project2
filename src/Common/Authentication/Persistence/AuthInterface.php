<?php

namespace Common\Authentication\Persistence;

echo __FILE__.PHP_EOL;

interface AuthInterface
{
    public function authenticate($username, $password);
}