<?php

namespace Infrastructure\Http\Provider;

use GuardsmanPanda\LarabearUi\Infrastructure\Http\Middleware\BearHtmxMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\Route;
use function base_path;

class RouteServiceProvider extends ServiceProvider {
    public function boot():void {
        $this->routes(function () {
             Route::middleware(['session:allow-guest'])->prefix('login')->group(base_path('Web/Login/routes.php'));

            Route::middleware(['session:allow-guest', BearHtmxMiddleware::class, SubstituteBindings::class])->group(function () {
                Route::prefix('')->group(base_path(path: 'Web/Dashboard/routes.php'));
                Route::prefix('author')->group(base_path(path: 'Web/Author/routes.php'));
                Route::prefix('book')->group(base_path(path: 'Web/Book/routes.php'));
                Route::prefix('map')->group(base_path(path: 'Web/Map/routes.php'));
                Route::prefix('narrator')->group(base_path(path: 'Web/Narrator/routes.php'));
                Route::prefix('series')->group(base_path(path: 'Web/Series/routes.php'));
                Route::prefix('universe')->group(base_path(path: 'Web/Universe/routes.php'));
            });
        });
    }
}
