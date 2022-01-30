<?php

namespace Web\Universe\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Infrastructure\Http\Service\Htmx;
use Symfony\Component\HttpFoundation\Response;

class UniverseController extends Controller {
    public function createDialog(): View {
        return view('universe::dialog.add-universe');
    }

    public function create(): Response {
        return Htmx::hxRedirect('/universe');
    }
}