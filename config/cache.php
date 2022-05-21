<?php

use Illuminate\Support\Str;

return [
    'default' => env(key: 'CACHE_DRIVER', default: 'file'),

    'stores' => [
        'database' => [
            'driver' => 'database',
            'table' => 'bear_cache',
            'connection' => 'pgsql',
            'lock_connection' => null,
        ],
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
        ],
        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],
        'octane' => [
            'driver' => 'octane',
        ],
    ],

    'prefix' => Str::slug(title: env(key: 'APP_NAME'), separator: '_') . '_cache_',
];
