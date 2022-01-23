<?php

namespace Web\Login\Utility;

use Domain\User\Model\User;
use Illuminate\Http\RedirectResponse;

class LoginUtility {
    public static function loginAndRedirect(User $user): RedirectResponse {
        session()->put('login_id', $user->id);
        return new RedirectResponse('/dashboard');
    }
}