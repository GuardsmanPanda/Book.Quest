<?php

use Illuminate\Support\Facades\Route;
use Web\Universe\Controller\UniverseController;
use Web\Universe\Controller\UniverseHomeController;

Route::get('/', [UniverseHomeController::class, 'index']);

Route::middleware('permission:universe__create')->group(function () {
    Route::get('/dialog-create', [UniverseController::class, 'createDialog']);
    Route::post('', [UniverseController::class, 'create']);
});