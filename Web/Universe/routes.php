<?php

use Illuminate\Support\Facades\Route;
use Web\Universe\Controller\UniverseHomeController;

Route::get('/', [UniverseHomeController::class, 'index']);