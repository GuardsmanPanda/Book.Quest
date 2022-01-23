<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\Web\Universe\Controller\UniverseHomeController::class, 'index']);