<?php declare(strict_types=1);

namespace Web\Author\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

final class AuthorHomeController extends Controller {

    public function index(): View {
        return view('author::home');
    }
}
