<?php

namespace Web\Layout\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class LandingPageController extends Controller {
    public function index(): View {
        return view('layout::landing-page.index');
    }
}