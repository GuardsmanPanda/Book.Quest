<?php

namespace Web\Narrator\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class NarratorCreationController extends Controller {
    public function createDialog(): View {
        return view('narrator::create.create-narrator');
    }

    public function create(): RedirectResponse {

    }
}