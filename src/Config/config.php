<?php

$projectDir     = realpath(dirname(__FILE__) . '/../../');
$authDir        = $projectDir . '/src/Common/Authentication';
$commonDir      = $projectDir . '/src/Common';
$controllersDir = $projectDir . '/src/Controllers';
$configDir      = $projectDir . '/src/Config';
$httpDir        = $projectDir . '/src/Common/Http';
$routerDir      = $projectDir . '/src/Common/Routers';
$exceptionDir   = $projectDir . '/src/Common/Exceptions';
$srcDir         = $projectDir . '/src';
$viewsDir       = $projectDir . '/src/Views';

$config = [
    'app' => [
        'classes'      => [
            'Common\\Authentication\\IFactory'              => $authDir         . '/IFactory.php',
            'Common\\Authentication\\PersistenceFactory'    => $authDir         . '/PersistenceFactory.php',
            'Common\\Authentication\\IAuthentication'       => $authDir         . '/IAuthentication.php',
            'Common\\Authentication\\FileBased'             => $authDir         . '/FileBased.php',
            'Common\\Authentication\\InMemory'              => $authDir         . '/InMemory.php',
            'Common\\Authentication\\Sqlite'                => $authDir         . '/Sqlite.php',
            'Common\\Authentication\\MySQL'                 => $authDir         . '/MySQL.php',
            'Common\\Http\\IRequest'                        => $httpDir         . '/IRequest.php',
            'Common\\Http\\SimpleRequest'                   => $httpDir         . '/SimpleRequest.php',
            'Common\\Http\\PostRequest'                     => $httpDir         . '/PostRequest.php',
            'Common\\Routers\\IRouter'                      => $routerDir       . '/IRouter.php',
            'Common\\Routers\\SimpleRouter'                 => $routerDir       . '/SimpleRouter.php',
            'Common\\Exceptions\\LoginException'            => $exceptionDir    . '/LoginException.php',
            'Controllers\\AuthController'                   => $controllersDir  . '/AuthController.php',
            'Controllers\\Controller'                       => $controllersDir  . '/Controller.php',
            'Controllers\\MainController'                   => $controllersDir  . '/MainController.php',
            'Views\\Welcome'                                => $viewsDir        . '/Welcome.php',
            'Views\\NotAuthorized'                          => $viewsDir        . '/NotAuthorized.php',
            'Views\\LoginForm'                              => $viewsDir        . '/LoginForm.php',
            'Views\\View'                                   => $viewsDir        . '/View.php',
            'Views\\Error'                                  => $viewsDir        . '/Error.php',
        ],
        'dir'          => [
            'authentication' => $authDir,
            'common'         => $commonDir,
            'controllers'    => $controllersDir,
            'config'         => $configDir,
            'http'           => $httpDir,
            'routers'        => $routerDir,
            'exceptions'     => $exceptionDir,
            'src'            => $srcDir,
            'views'          => $viewsDir
        ],
        'uri-mappings' => [
            '/auth' => 'Controllers\\AuthController',
            '/'     => 'Controllers\\MainController'
        ],
        'db'    => [
            'sqlite'    =>  $srcDir.'/test.db',
            'mysql'     =>  '"mysql:host=localhost;dbname=testdb;charset=utf8", "root", ""',
            'errorLevel'=>  'PDO::ERRMODE_EXCEPTION'
        ]
    ]
];