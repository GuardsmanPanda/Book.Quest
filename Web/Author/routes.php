<?php

use Illuminate\Support\Facades\Route;
use Web\Author\Controller\AuthorCreationController;
use Web\Author\Controller\AuthorHomeController;
use Web\Author\Controller\AuthorController;

Route::get('', [AuthorHomeController::class, 'index'])->name('author.index');

Route::get('show/{url_code}/{title?}', [AuthorController::class, 'show']);
Route::patch('{author}/user-status', [AuthorController::class, 'userStatus']);

Route::get('random', [AuthorController::class, 'random']);

Route::prefix('create')->middleware('permission:author__create')->group(function () {
    Route::get('dialog', [AuthorCreationController::class, 'createDialog']);
    Route::post('', [AuthorCreationController::class, 'create']);
});
