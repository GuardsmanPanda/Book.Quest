<?php

namespace Infrastructure\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function response;

class HtmxBuster {
    public function handle(Request $request, Closure $next): Response {
        $res = $next($request);
        if ($request->method() === 'GET' && $request->header('HX-request') === null && str_contains($request->header('accept'), 'html')) {
            return response()->view('layout.layout', [
                'content' => $res->getContent(),
            ]);
        }
        return $res;
    }
}
