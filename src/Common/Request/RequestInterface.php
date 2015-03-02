<?php

namespace Common\Authentication\Request;

interface RequestInterface
{
    public function getUserName();
    public function getPassword();
    public function getAuthMethod();
}