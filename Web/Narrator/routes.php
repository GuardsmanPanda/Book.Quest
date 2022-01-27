<?php

use Illuminate\Support\Facades\Route;
use Web\Narrator\Controller\NarratorHomeController;

Route::get('/', [NarratorHomeController::class, 'index']);