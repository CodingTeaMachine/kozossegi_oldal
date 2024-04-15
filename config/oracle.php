<?php

return [
    'oracle' => [

        'driver'         => 'oracle',
        'hostname'       => env('DB_HOST', ''),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', ''),
        'service_name'   => env('DB_SERVICE_NAME', ''),
        'username'       => env('DB_USERNAME', ''),
        'password'       => env('DB_PASSWORD', ''),

        'edition'        => env('DB_EDITION', 'standard'),
        'server_version' => env('DB_SERVER_VERSION', '11g'),

        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'load_balance'   => env('DB_LOAD_BALANCE', 'yes'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),

    ],
];
