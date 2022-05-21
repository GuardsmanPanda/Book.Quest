<?php

namespace Web\Login\Utility;

use Domain\User\Model\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LoginUtility {
    public static function loginAndRedirect(User $user): RedirectResponse {
        $last_ref = session()->get('oauth2ref');
        session()->migrate(true);
        session()->put('login_id', $user->id);
        return new RedirectResponse($last_ref ?? '/dashboard');
    }
}