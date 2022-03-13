<?php

namespace Infrastructure\Http\Kernel;

use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Infrastructure\Http\Middleware\HtmxBuster;
use Infrastructure\Http\Middleware\Integrity;
use Infrastructure\Http\Middleware\Initiate;
use Infrastructure\Http\Middleware\Permission;
use Infrastructure\Http\Middleware\TrimStrings;
use Infrastructure\Http\Middleware\WebAuth;

class HttpKernel extends Kernel {
    /**
     * The application's global HTTP middleware stack.
     *
     * These middlewares are run during every request to your application.
     *
     * @var array<class-string>
     */
    protected $middleware = [
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
        Initiate::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<class-string>>
     */
    protected $middlewareGroups = [
        'web' => [
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            WebAuth::class,
            Integrity::class,
            HtmxBuster::class,
            SubstituteBindings::class,
        ],
    ];

    /**
     * @var array<class-string>
     */
    protected $middlewarePriority = [
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
        AddQueuedCookiesToResponse::class,
        StartSession::class,
        Initiate::class,
        WebAuth::class,
        Permission::class,
        Integrity::class,
        HtmxBuster::class,
        SubstituteBindings::class,
    ];

    /**
     * @var array<string, class-string>
     */
    protected $routeMiddleware = [
        'cookie' => AddQueuedCookiesToResponse::class,
        'permission' => Permission::class,
        'session' => StartSession::class,
    ];
}
