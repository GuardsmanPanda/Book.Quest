<?php

namespace Web\Universe\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Infrastructure\Http\Service\Htmx;
use Service\Universe\Crud\UniverseCrud;
use Symfony\Component\HttpFoundation\Response;

class UniverseController extends Controller {
    public function createDialog(): View {
        return view('universe::dialog.add-universe');
    }

    public function create(): Response {
        $universe = UniverseCrud::createFromRequest();
        return Htmx::hxRedirect('/universe/show/' . $universe->universe_short_url_code . '/' . $universe->universe_slug);
    }
}
