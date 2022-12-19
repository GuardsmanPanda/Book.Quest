<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Web\Series\Controller\SeriesCreationController;
use Web\Series\Controller\SeriesHomeController;

Route::get('/', [SeriesHomeController::class, 'index']);

Route::prefix('create')->middleware('permission:series__create')->group(function () {
    Route::get('dialog', [SeriesCreationController::class, 'createDialog']);
    Route::get('universe-search', [SeriesCreationController::class, 'universeSearch']);
    Route::get('universe-search/{universe}', [SeriesCreationController::class, 'universeSearchResult']);
    Route::post('', [SeriesCreationController::class, 'create']);
});