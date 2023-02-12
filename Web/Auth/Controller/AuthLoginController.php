<?php declare(strict_types=1);

namespace Web\Auth\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

final class AuthLoginController extends Controller {
    public function loginDialog(): View {
        return view(view: 'auth::login-dialog');
    }
}
