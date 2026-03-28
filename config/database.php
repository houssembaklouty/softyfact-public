<?php

return [
    'default' => env('DB_CONNECTION', 'sqlite'),
    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', storage_path('app/database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => true,
        ],
    ],
    'migrations' => [
        'table' => 'migrations',
        'update_date_on_install' => true,
    ],
];
