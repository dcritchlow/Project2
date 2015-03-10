<?php

$config = [
    'application' => [
        'environment' => 'dev',
        'loglevel' => 1,
        'quiet'    => false,
        'dir'      => [
            'src'            => 'src',
            'config'         => 'src/Config',
        ],
        'classes' => [
            'Common\\Authentication\\Persistence\\AuthInterface' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'Persistence'.DIRECTORY_SEPARATOR.'AuthInterface.php',
            'Common\\Authentication\\Persistence\\InMemory' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'Persistence'.DIRECTORY_SEPARATOR.'InMemory.php',
            'Common\\Authentication\\Persistence\\FileBased' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'Persistence'.DIRECTORY_SEPARATOR.'FileBased.php',
            'Common\\Authentication\\Persistence\\MySQL' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'Persistence'.DIRECTORY_SEPARATOR.'MySQL.php',
            'Common\\Authentication\\Persistence\\Sqlite' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'Persistence'.DIRECTORY_SEPARATOR.'Sqlite.php',
            'Common\\Authentication\\FactoryInterface' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'FactoryInterface.php',
            'Common\\Authentication\\PersistenceFactory' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'PersistenceFactory.php',
            'Common\\Request\\RequestInterface' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Request'.DIRECTORY_SEPARATOR.'RequestInterface.php',
            'Common\\Request\\PostRequest' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Request'.DIRECTORY_SEPARATOR.'PostRequest.php',
            'Common\Exception\LoginException' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Exception'.DIRECTORY_SEPARATOR.'LoginException.php'
        ]
    ]
];