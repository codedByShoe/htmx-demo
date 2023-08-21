<?php

return [
    'db' => [
        'connection' => $_ENV['DB_CONNECTION'],
        'host'       => $_ENV['DB_HOST'],
        'port'       => $_ENV['DB_PORT'],
        'dbname'     => $_ENV['DB_NAME'],
        'dburl'     => $_ENV['DB_URL'],
        'dbuser'     => $_ENV['DB_USERNAME'],
        'dbpass'     => $_ENV['DB_PASSWORD'],
        'charset'    => 'utf8mb4'
    ]
];
