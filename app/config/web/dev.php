<?php

$config = [
    'language' => 'en',
    'db' => [
        // IP address instead hostname - Performance UP 100%
        'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=cordillera_demo;charset=utf8',
        'username' => 'root',
        'password' => 'root',
    ],
    'session' => [
        'key' => 'wZ32o92Xr9tXNVmF4gSP',
        //'path' => CORDILLERA_APP_DIR . 'tmp' . DS,
        'lifetime' => 30, //Minutes
        'cookie' => [
            'lifetime' => 0,
            'path' => '/',
            //'domain' => 'cordilleralabs.com',
            //'secure' => isset($_SERVER['HTTPS']),
            'httponly' => true,
        ],
    ],
    'request' => [
        'csrf' => true,
    ],
    'response' => [
        'default' => 'examples/site/index',
    ],
    'router' => [
        'show_index_file' => false,
        'rules' => require CORDILLERA_APP_DIR . 'config' . DS . 'routers.php',
    ],
    'exception' => [
        'show_log_id' => true,
    ],
];

if (file_exists(__DIR__ . '/dev-local.php')) {
    $config = array_merge($config, (array)require __DIR__ . '/dev-local.php');
}

return $config;
