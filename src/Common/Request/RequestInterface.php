<?php

namespace Common\Request;

interface RequestInterface
{
    public function getUserName();
    public function getPassword();
    public function getAuthMethod();
}