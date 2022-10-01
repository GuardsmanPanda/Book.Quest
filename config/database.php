<?php

use Illuminate\Support\Str;

return [
    'default' => 'pgsql',

    'model_generator' => [
        'audit_change' => [
            'location' => 'Infrastructure/Audit/Model',
        ],
        'author' => [
            'location' => 'Domain/Author/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'book' => [
            'location' => 'Domain/Book/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'category' => [
            'location' => 'Domain/Book/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'country' => [
            'location' => 'Domain/App/Model',
        ],
        'language' => [
            'location' => 'Domain/App/Model',
        ],
        'narrator' => [
            'location' => 'Domain/Narrator/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'series' => [
            'location' => 'Domain/Series/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'time_period' => [
            'location' => 'Domain/Book/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'universe' => [
            'location' => 'Domain/Universe/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'uri' => [
            'location' => 'Domain/Uri/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'uri_source' => [
            'location' => 'Domain/Uri/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'users' => [
            'class' => 'User',
            'location' => 'Domain/User/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'z_config' => [
            'class' => 'Config',
            'location' => 'Infrastructure/App/Model',
            'traits' => [\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
    ],

    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => 'book_quest',
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'book',
        ],
        'transaction_free' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => 'book_quest',
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'book',
        ],
    ],

    'migrations' => 'bear_migration',
];
