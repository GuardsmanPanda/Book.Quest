<?php

namespace Infrastructure\Http\Kernel;

use GuardsmanPanda\Larabear\Middleware\InitiateMiddleware;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Infrastructure\Http\Middleware\HtmxBuster;
use Infrastructure\Http\Middleware\Integrity;
use Infrastructure\Http\Middleware\Permission;
use Infrastructure\Http\Middleware\WebAuth;

class HttpKernel extends Kernel {
    protected $middleware = [
        InitiateMiddleware::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<class-string>>
     */
    protected $middlewareGroups = [
        'web' => [
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
        StartSession::class,
        InitiateMiddleware::class,
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
        'permission' => Permission::class,
        'session' => StartSession::class,
    ];
}
