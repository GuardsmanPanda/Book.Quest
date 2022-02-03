<?php

use Illuminate\Support\Facades\Route;
use Web\Series\Controller\SeriesController;
use Web\Series\Controller\SeriesHomeController;

Route::get('/', [SeriesHomeController::class, 'index']);

Route::middleware('permission:series__create')->group(function () {
    Route::get('/dialog-create', [SeriesController::class, 'createDialog']);
    Route::post('', [SeriesController::class, 'create']);
});