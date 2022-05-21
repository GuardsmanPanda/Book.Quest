<?php

namespace Infrastructure\Exception;

use GuardsmanPanda\Larabear\Service\Req;
use Illuminate\Foundation\Exceptions\Handler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;
use function config;

class ExceptionHandler extends Handler {
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): Response {
        if (Req::ip() === config('app.dev_ip')) {
            config()->set('app.debug', true);
        }
        if (config('app.debug')) {
            return parent::render($request, $e);
        }
        $e = $this->prepareException($e);
        return $e instanceof  HttpExceptionInterface ? new Response($e->getMessage(), $e->getStatusCode(), $e->getHeaders()) : new Response($e->getMessage(), 500);
    }
}
