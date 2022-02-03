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
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'author_uri' => [
            'location' => 'Domain/Author/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'book' => [
            'location' => 'Domain/Book/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'book_uri' => [
            'location' => 'Domain/Book/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'category' => [
            'location' => 'Domain/Book/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'time_period' => [
            'location' => 'Domain/Book/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'country' => [
            'location' => 'Infrastructure/App/Model',
        ],
        'language' => [
            'location' => 'Infrastructure/App/Model',
        ],
        'series' => [
            'location' => 'Domain/Series/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'series_uri' => [
            'location' => 'Domain/Series/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'universe' => [
            'location' => 'Domain/Universe/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'universe_uri' => [
            'location' => 'Domain/Universe/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'users' => [
            'class' => 'User',
            'location' => 'Domain/User/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
        'z_config' => [
            'class' => 'Config',
            'location' => 'Infrastructure/App/Model',
            'traits' =>[\Infrastructure\Audit\Traits\AuditChangeLogger::class],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'book',
        ],
    ],


    'migrations' => 'z_migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
