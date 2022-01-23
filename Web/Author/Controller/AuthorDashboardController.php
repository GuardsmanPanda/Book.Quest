<?php

namespace Web\Author\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class AuthorDashboardController extends Controller {

    public function index(): View {
        return view('author::dashboard');
    }
}