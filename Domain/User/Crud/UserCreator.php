<?php

namespace Domain\User\Crud;

use Domain\User\Model\User;

class UserCreator {
    public static function create(
        string $display_name,
        string $email,
        int $twitch_id,
    ): User {
        $user = new User();
        $user->display_name = $display_name;
        $user->email = $email;
        $user->twitch_id = $twitch_id;
        $user->save();
        return $user;
    }
}