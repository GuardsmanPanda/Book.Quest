<?php

namespace Infrastructure\Http\Kernel;

use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Infrastructure\Auth\Middleware\Permission;
use Infrastructure\Auth\Middleware\WebAuth;
use Infrastructure\Http\Middleware\HtmxBuster;
use Infrastructure\Http\Middleware\Idempotency;
use Infrastructure\Http\Middleware\Initiate;
use Infrastructure\Http\Middleware\TrimStrings;

class HttpKernel extends Kernel {
    /**
     * The application's global HTTP middleware stack.
     *
     * These middlewares are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
        Initiate::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            WebAuth::class,
            Idempotency::class,
            HtmxBuster::class,
            SubstituteBindings::class,
        ],
    ];

    protected $middlewarePriority = [
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
        AddQueuedCookiesToResponse::class,
        StartSession::class,
        Initiate::class,
        WebAuth::class,
        Permission::class,
        Idempotency::class,
        HtmxBuster::class,
        SubstituteBindings::class,
    ];

    protected $routeMiddleware = [
        'cookie' => AddQueuedCookiesToResponse::class,
        'permission' => Permission::class,
        'session' => StartSession::class,
    ];
}
