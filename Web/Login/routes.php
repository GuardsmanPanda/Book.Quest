<?php

use Illuminate\Support\Facades\Route;
use Web\Login\Controller\TwitchLoginController;

Route::prefix('twitch')->group(function () {
    Route::get('/redirect', [TwitchLoginController::class, 'redirect'])->name('twitch.login');
    Route::get('/callback',  [TwitchLoginController::class, 'callback'])->name('twitch.callback');
});

Route::get('login-selector-dialog', [\Web\Login\Controller\LoginController::class, 'loginSelectorDialog']);