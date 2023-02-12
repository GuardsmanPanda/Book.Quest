<?php declare(strict_types=1);

namespace Web\Universe\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

final class UniverseHomeController extends Controller {
    public function index(): View {
        return view('universe::home');
    }
}
