<?php

namespace Infrastructure\Auth\Service;

use Domain\User\Model\User;

class Auth {
    private static ?string $user_id = null;
    private static ?User $current_user = null;

    public static function id(): ?string {
        return self::$user_id;
    }

    public static function user(): ?User {
        if (self::$user_id === null) {
            return null;
        }
        self::$current_user ??= User::find(self::$user_id);
        return self::$current_user;
    }
}
