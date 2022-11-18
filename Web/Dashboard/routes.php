<?php

use Illuminate\Support\Facades\Route;
use Web\Dashboard\Controller\DashboardController;

Route::get(uri: '', action: [DashboardController::class, 'index']);