<?php

namespace Web\Login\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class LoginController extends Controller {
    public function loginSelectorDialog(): View {
        return view('login::login-selector-dialog');
    }
}