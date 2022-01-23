<?php

namespace Infrastructure\Http\Provider;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use function base_path;

class RouteServiceProvider extends ServiceProvider {
    public function boot():void {
        $this->routes(function () {
             Route::group([], base_path('Web/Layout/routes.php'));

            Route::middleware('web')->group(function () {
                Route::prefix('author')->group(base_path('Web/Author/routes.php'));
                Route::prefix('book')->group(base_path('Web/Book/routes.php'));
                Route::prefix('dashboard')->group(base_path('Web/Dashboard/routes.php'));
                Route::prefix('login')->group(base_path('Web/Login/routes.php'));
            });
        });
    }
}
