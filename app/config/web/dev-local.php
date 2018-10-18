<?php

$config = [];

$dsn = getenv('CLEARDB_DATABASE_URL');
$user = getenv('CLEARDB_DATABASE_USER');
$password = getenv('CLEARDB_DATABASE_PASSWORD');

if ($dsn && $user && $password) {

    $config['db'] = [
        'dsn' => $dsn,
        'username' => $user,
        'password' => $password,
    ];
}

return $config;
