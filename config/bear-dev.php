<?php

return [
    //------------------------------------------------------------------------------------------------------------------
    // General config required to generate Crud classes.
    //------------------------------------------------------------------------------------------------------------------
    'data_access_layer_folder' => 'Domain',
    'application_layer_folder' => 'Service',
    'presentation_layer_folder' => 'Web',

    //------------------------------------------------------------------------------------------------------------------
    // Config for generating eloquent models, the "eloquent-models" array has en entry for each connection that wants models generated,as defined in config/database.php
    //------------------------------------------------------------------------------------------------------------------
    'eloquent-model-generator' => [
        'pgsql' => [
            'author' => ['location' => 'Domain/Author/Model', 'log_change' => true],
            'author_user' => ['location' => 'Domain/Author/Model', 'log_change' => true],
            'book' => ['location' => 'Domain/Book/Model', 'log_change' => true],
            'book_category' => ['location' => 'Domain/Book/Model', 'log_change' => true],
            'book_time_period' => ['location' => 'Domain/Book/Model', 'log_change' => true],
            'narrator' => ['location' => 'Domain/Narrator/Model', 'log_change' => true],
            'series' => ['location' => 'Domain/Series/Model', 'log_change' => true],
            'universe' => ['location' => 'Domain/Universe/Model', 'log_change' => true],
            'users' => ['class' => 'User', 'location' => 'Domain/User/Model', 'log_change' => true],
        ]
    ]
];
