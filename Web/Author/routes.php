<?php

use Illuminate\Support\Facades\Route;
use Web\Author\Controller\AuthorCreationController;
use Web\Author\Controller\AuthorHomeController;

Route::get('', [AuthorHomeController::class, 'index'])->name('author.index');

Route::prefix('create')->middleware('permission:author__create')->group(function () {
    Route::get('dialog', [AuthorCreationController::class, 'createDialog']);
    Route::post('', [AuthorCreationController::class, 'create']);
});
