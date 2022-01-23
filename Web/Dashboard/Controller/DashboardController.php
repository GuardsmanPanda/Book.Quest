<?php

namespace Web\Dashboard\Controller;

use Illuminate\Contracts\View\View;

class DashboardController {
    public function index(): View {
        return view('dashboard::index');
    }
}