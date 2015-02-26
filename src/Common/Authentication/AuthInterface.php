<?php

namespace Common\Authentication;

interface AuthInterface
{
    public function authenticate($username, $password);
}