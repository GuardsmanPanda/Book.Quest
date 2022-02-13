<?php

namespace Web\Narrator\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Infrastructure\Http\Service\Htmx;
use Service\Narrator\Crud\NarratorCreatorService;
use Symfony\Component\HttpFoundation\Response;

class NarratorCreationController extends Controller {
    public function createDialog(): View {
        return view('narrator::create.create-narrator');
    }

    public function create(): Response  {
        $narrator = NarratorCreatorService::createFromRequest();
        return Htmx::hxRedirect('/narrator/show/' . $narrator->narrator_short_url_code . '/' . $narrator->narrator_slug);
    }
}