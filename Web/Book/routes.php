<?php

use Illuminate\Support\Facades\Route;
use Web\Book\Controller\BookHomeController;

Route::get('/', [BookHomeController::class, 'index']);