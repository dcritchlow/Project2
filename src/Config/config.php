<?php

$config = [
    'application' => [
        'environment' => 'dev',
        'loglevel' => 1,
        'quiet'    => false,
        'dir'      => [
            'src'            => $sourceDir,
            'config'         => $configDir,
        ],
        'classes' => [
            'Common\\Authentication\\Persistence\\AuthInterface' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'AuthInterface.php',
            'Common\\Authentication\\FactoryInterface' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'AuthInterface.php',
            'Common\\Authentication\\PersistenceFactory' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Authentication'.DIRECTORY_SEPARATOR.'AuthInterface.php',
            'Common\\Request\\RequestInterface' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Request'.DIRECTORY_SEPARATOR.'RequestInterface.php',
            'Common\\Request\\PostRequest' =>
                $sourceDir.DIRECTORY_SEPARATOR.'Common'.DIRECTORY_SEPARATOR.
                'Request'.DIRECTORY_SEPARATOR.'PostRequest.php',
        ]
    ]
];