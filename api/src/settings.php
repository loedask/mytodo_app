<?php

if(!defined('APP_ROOT'))
    define('APP_ROOT', __DIR__);


return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'doctrine' => [
            // if true, metadata caching is forcefully disabled
            'dev_mode' => true,


            // path where the compiled metadata info will be cached
            // make sure the path exists and it is writable
            'cache_dir' => APP_ROOT . '/cache',

            'meta'=>[
                'entity_path'=>[
                    APP_ROOT.'/entity'
                ],
                'auto_generate_proxies'=>true,
                'proxy_dir'=> __DIR__.'/../cache/proxies',
                'cache'=>null,
            ],


            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'port' => 3306,
                'dbname' => 'todolist',
                'user' => 'root',
                'password' => '',
                'charset' => 'utf8mb4'
            ]
        ]
    ],
];
