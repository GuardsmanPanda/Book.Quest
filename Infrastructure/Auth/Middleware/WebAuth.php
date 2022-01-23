<?php

namespace Infrastructure\Auth\Middleware;

use Closure;
use Illuminate\Http\Request;
use Infrastructure\Auth\Auth;
use Infrastructure\Http\Service\Req;
use function abort_unless;
use function redirect;
use function session;

class WebAuth {
    public function handle(Request $request, Closure $next) {
        if (Req::isWriteRequest()) { // Check CSRF token if applicable.
            $token = $request->input('_token')
                ?? $request->header('X-CSRF-TOKEN')
                ?? $request->header('X-XSRF-TOKEN');
            abort_unless(hash_equals($request->session()->token(), $token), 403, 'Invalid CSRF Token');
        }
        Auth::setLoggedInUserId(session()->get('login_id'));
        return $next($request);
    }
}
