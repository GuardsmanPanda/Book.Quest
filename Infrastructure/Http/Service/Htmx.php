<?php

namespace Infrastructure\Http\Service;

use GuardsmanPanda\Larabear\Middleware\InitiateMiddleware;
use GuardsmanPanda\Larabear\Service\Req;
use Symfony\Component\HttpFoundation\Response;

class Htmx {
    public static function hxRedirect(string $location, string $message = 'Redirect', int $code = 302): Response {
        return new Response($message, $code, ['hx-redirect' => $location]);
    }

    public static function hxRefresh(string $message = 'Redirect', int $code = 302): void {
        abort($code, $message, ['hx-refresh' => 'true']);
    }

    public static function getAreaFromHtmxHeader(): string {
        preg_match('$^https://(?:dev.)?book.quest/([^/]*)$',Req::header('HX-Current-URL'), $matches);
        return $matches[1];
    }

    public static function pushUrl(string $url): void {
        InitiateMiddleware::$headers['hx-push'] = $url;
    }
}