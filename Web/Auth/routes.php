<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Web\Auth\Controller\AuthLoginController;

Route::get('login-dialog', [AuthLoginController::class, 'loginDialog']);
