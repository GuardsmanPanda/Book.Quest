<?php

namespace Infrastructure\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Infrastructure\Http\Service\Htmx;
use Infrastructure\Http\Service\Req;
use function response;

class HtmxBuster {
    public function handle(Request $request, Closure $next) {
        $route_prefix = explode('/', ltrim($request->path(), '/'))[0];
        if ($request->method() === 'GET') {
            if ($request->header('HX-request') !== null) {
                $prev_area =  Htmx::getAreaFromHtmxHeader();
                $new_area = Req::getAreaFromPath();
                $res = $next($request);
                if ($new_area !== $prev_area) {
                     $menu = match ($new_area) {
                        'author' => view('layout.menu-author')->render(),
                        default => '',
                    };
                    if ($menu !== '') {
                        $res->setContent($res->getContent().'<div id="left-menu" hx-swap-oob="true">' . $menu . '</div>');
                     }
                }
                return $res;
            } elseif (str_contains($request->header('accept'), 'html')) {
                return response()->view('layout.layout', [
                    'primary_hx' => 'hx-get="/' .trim($request->path(), '/') . '" hx-trigger="load"',
                ]);
            }
        }
        return $next($request);
    }
}
