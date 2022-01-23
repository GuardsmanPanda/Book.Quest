<?php

namespace Infrastructure\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use function response;

class HtmxBuster {
    public function handle(Request $request, Closure $next) {
        $route_prefix = explode('/', ltrim($request->path(), '/'))[0];
        if ($route_prefix === 'login' ||  $request->method() !== 'GET' || $request->header('HX-request') !== null) {
            return $next($request);
        }

        $a = $request->header('accept');
        if (str_contains($a, 'html')) {
            return response()->view('layout.layout', [
                'primary_hx' => 'hx-get="/' .trim($request->path(), '/') . '" hx-trigger="load"',
            ]);
        }
        return $next($request);
    }
}
