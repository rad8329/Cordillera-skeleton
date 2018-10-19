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
        'lifetime' => 30, //Minutes
        'cookie' => [
            'lifetime' => 0,
            'path' => '/',
            //'domain' => 'cordilleralabs.com',
            'secure' => isset($_SERVER['HTTPS']),
            'httponly' => true,
        ]
    ];
}

return $config;
