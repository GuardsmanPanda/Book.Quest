<?php

namespace Web\Series\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class SeriesController extends Controller {
    public function createDialog(): View {
        return view('series::dialog.add-series');
    }

}