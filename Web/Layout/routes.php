<?php

use Illuminate\Support\Facades\Route;
use Web\Layout\Controller\LandingPageController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');