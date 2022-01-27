<?php

use Illuminate\Support\Facades\Route;
use Web\Series\Controller\SeriesHomeController;

Route::get('/', [SeriesHomeController::class, 'index']);