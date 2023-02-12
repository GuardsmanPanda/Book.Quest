<?php declare(strict_types=1);

namespace Infrastructure\Http\Provider;

use Carbon\Carbon;
use Domain\Author\Crud\AuthorCreator;
use GuardsmanPanda\Larabear\Infrastructure\Http\Middleware\BearHtmxMiddleware;
use GuardsmanPanda\Larabear\Infrastructure\Http\Middleware\BearTransactionMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\Route;
use function base_path;

final class RouteServiceProvider extends ServiceProvider {
    public function boot(): void {
        $this->routes(function () {
            Route::prefix('auth')->middleware(['session:allow-guest'])->group(base_path(path: 'Web/Auth/routes.php'));
            Route::middleware(['session:allow-guest', BearHtmxMiddleware::class, BearTransactionMiddleware::class])->group(function () {
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
