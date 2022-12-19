<?php declare(strict_types=1);

use Illuminate\Support\Str;

return [
    'default' => 'pgsql',

    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => 5432,
            'database' => 'book_quest',
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8',
            'prefix_indexes' => true,
            'schema' => 'book',
        ],
        'transaction_free' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => 5432,
            'database' => 'book_quest',
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8',
            'prefix_indexes' => true,
            'schema' => 'book',
        ],
    ],

    'migrations' => 'bear_migration',
];
