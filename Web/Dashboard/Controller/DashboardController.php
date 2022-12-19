<?php declare(strict_types=1);

namespace Web\Dashboard\Controller;

use Illuminate\Contracts\View\View;

class DashboardController {
    public function index(): View {
        return view(view: 'dashboard::index');
    }
}