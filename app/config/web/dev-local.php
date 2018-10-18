<?php

$config = [

    'db' => [
        // IP address instead hostname - Performance UP 100%
        'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=cordillera_demo;charset=utf8',
        'username' => 'root',
        'password' => 'root',
    ],
];

//mysql://b5c20bd8030ce0:a5ba8363@us-cdbr-iron-east-01.cleardb.net/heroku_656ffe765e1c295?reconnect=true

return $config;
