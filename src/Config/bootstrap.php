<?php

echo __FILE__.PHP_EOL;

spl_autoload_register('Autoloader::loader');


// read environment variable to tell if it is dev or prod and change logging level