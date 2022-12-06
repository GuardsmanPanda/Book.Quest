<?php

return [
    'cookie' => [
        'session_key' => env(key: 'LARABEAR_SESSION_KEY'),
    ],
    'log_database_connection' => 'transaction_free',
    'log_database_change_channel' =>  null,
    'response_error_log' => [
        'enabled' => true,
        'ignore_response_codes' => [],
    ],
    'route_usage_log' => [
        'enabled' => true,
        'log_one_in_every' => 10,
    ],
    'uptime_kuma' => [
        'base_url' => env(key: 'LARABEAR_UPTIME_KUMA_BASE_URL'),
    ],

    //------------------------------------------------------------------------------------------------------------------
    // Config for generating eloquent models, the "eloquent-models" array has en entry for each connection that wants models generated,as defined in config/database.php
    //------------------------------------------------------------------------------------------------------------------
    'eloquent-model-generator' => [
        'pgsql' => [
            'author' => ['location' => 'Domain/Author/Model', 'log_change' => true],
            //'author_user' => ['location' => 'Domain/Author/Model', 'log_change' => true],
            'book' => ['location' => 'Domain/Book/Model', 'log_change' => true],
            'book_category' => ['location' => 'Domain/Book/Model', 'log_change' => true],
            'book_time_period' => ['location' => 'Domain/Book/Model', 'log_change' => true],
            'narrator' => ['location' => 'Domain/Narrator/Model', 'log_change' => true],
            'series' => ['location' => 'Domain/Series/Model', 'log_change' => true],
            'universe' => ['location' => 'Domain/Universe/Model', 'log_change' => true],
        ]
    ]
];
