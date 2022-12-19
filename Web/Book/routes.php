<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Web\Book\Controller\BookHomeController;

Route::get('/', [BookHomeController::class, 'index']);