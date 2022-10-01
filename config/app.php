<?php

use GuardsmanPanda\Larabear\Infrastructure\Integrity\Service\ValidateAndParseValue;
use GuardsmanPanda\Larabear\Provider\BearServiceProvider;
use GuardsmanPanda\LarabearAuth\Infrastructure\Laravel\Provider\BearAuthServiceProvider;
use GuardsmanPanda\LarabearUi\Infrastructure\Laravel\Provider\BearUiServiceProvider;
use Infrastructure\Http\Provider\RouteServiceProvider;
use Infrastructure\View\Provider\ViewDomainProvider;

return [
    'env' => ValidateAndParseValue::mustBeInArray(value: env(key: 'APP_ENV', default: 'production'), array: ['local', 'production'], errorMessage: 'APP_ENV must be one of: local, production'),
    'debug' => ValidateAndParseValue::parseBool(value: env(key: 'APP_DEBUG', default: false), errorMessage: 'APP_DEBUG must be a boolean value'),
    'key' =>ValidateAndParseValue::parseString(value: env(key: 'APP_KEY'), errorMessage: 'APP_KEY must be set and be a string.'),
    'url' => ValidateAndParseValue::parseString(value: env(key: 'APP_URL'), errorMessage: 'APP_URL must be a string'),
    'name' => 'Book.Quest',
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',

    'cipher' => 'AES-256-CBC',

    'maintenance' => ['driver' => 'file'],

    'providers' => [
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

        BearServiceProvider::class,
        BearAuthServiceProvider::class,
        BearUiServiceProvider::class,

        ViewDomainProvider::class,
        RouteServiceProvider::class,
    ],

    'aliases' => [
        'App' => Illuminate\Support\Facades\App::class,
    ]
];
