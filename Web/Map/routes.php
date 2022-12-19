<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Web\Map\Controller\MapHomeController;

Route::get('/', [MapHomeController::class, 'index']);