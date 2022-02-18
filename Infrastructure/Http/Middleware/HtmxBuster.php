<?php

namespace Infrastructure\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Infrastructure\Http\Service\Htmx;
use Infrastructure\Http\Service\Req;
use Symfony\Component\HttpFoundation\Response;
use function response;

class HtmxBuster {
    public function handle(Request $request, Closure $next): Response {
        $res = $next($request);
        if ($request->header('HX-target') === 'primary') {
            $prev_area = Htmx::getAreaFromHtmxHeader();
            $new_area = Req::getAreaFromPath();
            if ($new_area !== $prev_area) {
                $menu = match ($new_area) {
                    'author', 'book', 'map', 'narrator', 'series', 'universe' => view("layout.menu-$new_area")->render(),
                    default => '',
                };
                if ($menu !== '') {
                    $res->setContent($res->getContent() . '<div id="left-menu" hx-swap-oob="true">' . $menu . '</div>');
                }
            }
            return $res;
        }
        if ($request->method() === 'GET' && $request->header('HX-request') === null && str_contains($request->header('accept'), 'html')) {
            return response()->view('layout.layout', [
                'content' => $res->getContent(),
            ]);
        }
        return $res;
    }
}
