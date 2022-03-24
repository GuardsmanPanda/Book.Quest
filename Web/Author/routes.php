<?php

use Illuminate\Support\Facades\Route;
use Web\Author\Controller\AuthorCrudController;
use Web\Author\Controller\AuthorHomeController;
use Web\Author\Controller\AuthorController;

Route::get('', [AuthorHomeController::class, 'index'])->name('author.index');
Route::get('show/{url_code}/{title?}', [AuthorController::class, 'show']);
Route::get('random', [AuthorController::class, 'random']);

Route::prefix('create')->middleware('permission:author__create')->group(function () {
    Route::get('dialog', [AuthorCrudController::class, 'createDialog']);
    Route::post('', [AuthorCrudController::class, 'create']);
});

Route::prefix('{author}')->group( function () {
    Route::get('update', [AuthorCrudController::class, 'update'])->middleware('permission:author__update');
    Route::patch('user-status', [AuthorController::class, 'userStatus']);
});