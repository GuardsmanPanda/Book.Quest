<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Web\Narrator\Controller\NarratorCreationController;
use Web\Narrator\Controller\NarratorHomeController;

Route::get('/', [NarratorHomeController::class, 'index']);

Route::prefix('create')->middleware('permission:narrator__create')->group(function () {
    Route::get('dialog', [NarratorCreationController::class, 'createDialog']);
    Route::post('', [NarratorCreationController::class, 'create']);
});