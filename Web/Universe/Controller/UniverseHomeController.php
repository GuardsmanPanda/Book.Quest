<?php

namespace Web\Universe\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class UniverseHomeController extends Controller {
    public function index(): View {
        return view('universe::home');
    }
}