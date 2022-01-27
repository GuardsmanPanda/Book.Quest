<?php

namespace Web\Map\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class MapHomeController extends Controller {
    public function index(): View {
        return view('map::home');
    }
}