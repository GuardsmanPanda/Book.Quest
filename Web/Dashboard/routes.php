<?php

use Illuminate\Support\Facades\Route;
use Web\Dashboard\Controller\DashboardController;

Route::get('', [DashboardController::class, 'index'])->name('dashboard');