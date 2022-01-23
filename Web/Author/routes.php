<?php

use Illuminate\Support\Facades\Route;
use Web\Author\Controller\AuthorController;
use Web\Author\Controller\AuthorDashboardController;

Route::get('', [AuthorDashboardController::class, 'index'])->name('author.index');

Route::middleware('permission:author__create')->group(function () {
    Route::get('/dialog-create', [AuthorController::class, 'createDialog']);
    Route::post('', [AuthorController::class, 'create']);
});
