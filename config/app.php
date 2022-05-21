<?php

use Infrastructure\Http\Provider\RouteServiceProvider;
use Infrastructure\View\Provider\ViewDomainProvider;
use GuardsmanPanda\Larabear\Service\ValidateAndParseValue;

return [
    'name' => ValidateAndParseValue::parseString(value: env(key: 'APP_NAME'), errorMessage: 'APP_NAME must be a string'),
    'env' => ValidateAndParseValue::ensureInArray(value: env(key: 'APP_ENV', default: 'production'), array: ['local', 'production'], errorMessage: 'APP_ENV must be one of: local, production'),
    'debug' => ValidateAndParseValue::parseBool(value: env(key: 'APP_DEBUG'), errorMessage: 'APP_DEBUG must be a boolean value'),
    'url' => ValidateAndParseValue::parseString(value: env(key: 'APP_URL'), errorMessage: 'APP_URL must be a string'),
    'asset_url' => env(key: 'ASSET_URL'),
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',

    'key' => is_string(env(key: 'APP_KEY')) ? env(key: 'APP_KEY') : throw new InvalidArgumentException(message: 'APP_KEY must be set.'),
    'cipher' => 'AES-256-CBC',

    'maintenance' => ['driver' => 'file'],

    'providers' => [
        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        ViewDomainProvider::class,
        RouteServiceProvider::class,
    ],

    'aliases' => [
        'App' => Illuminate\Support\Facades\App::class,
    ]
];
