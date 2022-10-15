<?php

namespace Infrastructure\Http\Kernel;

use GuardsmanPanda\Larabear\Infrastructure\Http\Middleware\BearInitiateMiddleware;
use GuardsmanPanda\Larabear\Infrastructure\Http\Middleware\BearTransactionMiddleware;
use GuardsmanPanda\LarabearAuth\Infrastructure\Http\Middleware\BearAccessTokenAppMiddleware;
use GuardsmanPanda\LarabearAuth\Infrastructure\Http\Middleware\BearAccessTokenUserMiddleware;
use GuardsmanPanda\LarabearAuth\Infrastructure\Http\Middleware\BearPermissionMiddleware;
use GuardsmanPanda\LarabearAuth\Infrastructure\Http\Middleware\BearRoleMiddleware;
use GuardsmanPanda\LarabearAuth\Infrastructure\Http\Middleware\BearSessionAuthMiddleware;
use GuardsmanPanda\LarabearUi\Infrastructure\Http\Middleware\BearHtmxMiddleware;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Routing\Middleware\SubstituteBindings;

class HttpKernel extends Kernel {
    /** @var class-string[] $middleware Run Always */
    protected $middleware = [
        BearInitiateMiddleware::class,
    ];

    /** @var class-string[] $middlewarePriority Order, run always middleware always runs first. */
    protected $middlewarePriority = [
        BearInitiateMiddleware::class,
        BearAccessTokenAppMiddleware::class,
        BearAccessTokenUserMiddleware::class,
        BearSessionAuthMiddleware::class,
        BearRoleMiddleware::class,
        BearPermissionMiddleware::class,
        BearTransactionMiddleware::class,
        BearHtmxMiddleware::class,
        SubstituteBindings::class,
    ];
}
