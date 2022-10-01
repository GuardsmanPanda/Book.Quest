<?php

return [
    'driver' => 'file',
    'lifetime' => 120,
    'expire_on_close' => false,

    'encrypt' => false, // Server side session encryption
    'files' => storage_path(path: 'framework/sessions'),

    'connection' => env(key: 'SESSION_CONNECTION'),
    'table' => 'z_session',
    'store' => env(key: 'SESSION_STORE'),
    'lottery' => [2, 1000],

    'cookie' => '__host-session',
    'path' => '/',
    'domain' => null,
    'secure' => true,
    'http_only' => true,
    'same_site' => 'lax',
];
