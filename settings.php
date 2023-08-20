<?php

return [
    'db' => [
        'default' => $_ENV['DB_CONNECTION'],
        'connections' => [
            'sqlite' => [
                'driver' => 'sqlite',
                'url' => $_ENV['DB_URL'],
                'database' => $_ENV['DB_NAME'],
                'prefix' => '',
                'foreign_key_constraints' => $_ENV['DB_FOREIGN_KEYS'],
            ],
            'mysql' => [
                'driver' => 'mysql',
                'url' => $_ENV['DB_URL'],
                'host' => $_ENV['DB_HOST'],
                'port' => $_ENV['DB_PORT'],
                'database' => $_ENV['DB_NAME'],
                'username' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],
                'unix_socket' => $_ENV['DB_SOCKET'],
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => extension_loaded('pdo_mysql') ? array_filter([
                    PDO::MYSQL_ATTR_SSL_CA => getenv('MYSQL_ATTR_SSL_CA'),
                ]) : []
            ]
        ]
    ]
];
