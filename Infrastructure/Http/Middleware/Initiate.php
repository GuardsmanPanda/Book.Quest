<?php

namespace Infrastructure\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Infrastructure\Http\Service\Req;
use Symfony\Component\HttpFoundation\Response;

class Initiate {
    /**
     * @var array<string, string>
     */
    public static array $headers = ['Cache-Control' => 'must-revalidate, no-store, private'];

    public function handle(Request $request, Closure $next): Response  {
        Req::$r = $request;
        $resp = $next($request);
        if (method_exists($resp, 'header')) {
            foreach (self::$headers as $key => $value) {
                $resp->header($key, $value);
            }
        }
        return $resp;
    }
}
