<?php

class Autoloader
{
    public function loader($class)
    {
        if (!file_exists($class))
        {
            return false;
        }
        include $class;
    }
}