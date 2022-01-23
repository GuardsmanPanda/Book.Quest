<?php

use Illuminate\Support\Facades\Route;
use Web\Author\Controller\AuthorController;
use Web\Author\Controller\AuthorHomeController;

Route::get('', [AuthorHomeController::class, 'index'])->name('author.index');

Route::middleware('permission:author__create')->group(function () {
    Route::get('/dialog-create', [AuthorController::class, 'createDialog']);
    Route::post('', [AuthorController::class, 'create']);
});
