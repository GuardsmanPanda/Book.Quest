<?php declare(strict_types=1);

namespace Web\Narrator\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

final class NarratorHomeController extends Controller {
    public function index(): View {
        return view('narrator::home');
    }
}
