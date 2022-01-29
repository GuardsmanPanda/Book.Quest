<?php

namespace Web\Universe\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class UniverseController extends Controller {
    public function createDialog(): View {
        return view('universe::dialog.add-universe');
    }
}