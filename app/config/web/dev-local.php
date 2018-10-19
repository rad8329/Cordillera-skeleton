<?php

$config = [];

$dsn = getenv('CLEARDB_DATABASE_URL');
$user = getenv('CLEARDB_DATABASE_USER');
$password = getenv('CLEARDB_DATABASE_PASSWORD');
$session_key = getenv('SESSION_KEY');

if ($dsn && $user && $password) {

    $config['db'] = [
        'dsn' => $dsn,
        'username' => $user,
        'password' => $password,
    ];

    $config['session'] = [
        'key' => $session_key,
        'path' => CORDILLERA_APP_DIR . 'tmp' . DS,
        'lifetime' => 30, //Minutes
        'cookie' => [
            'lifetime' => 1296000, //15 days
            'path' => '/',
            //'domain' => 'cordilleralabs.com',
            'secure' => isset($_SERVER['HTTPS']),
            'httponly' => true,
        ]
    ];
}

return $config;
