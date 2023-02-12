<?php declare(strict_types=1);

namespace Web\Series\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

final class SeriesHomeController extends Controller {
    public function index(): View {
        return view('series::home');
    }
}
