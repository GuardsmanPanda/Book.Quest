<?php

namespace Infrastructure\Auth\Middleware;

use Closure;
use Illuminate\Http\Request;
use Infrastructure\Auth\Service\Auth;
use function abort_unless;

class Permission {
    public function handle(Request $request, Closure $next, string $permission) {
        abort_unless(Auth::hasPermission($permission), 403, 'No valid permission for route.');
        return $next($request);
    }
}
