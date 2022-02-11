<?php

namespace Service\User\Service;

use Domain\User\Crud\UserCreator;
use Domain\User\Model\User;

class UserFromTwitchDataService {
    /**
     * @param array<string, mixed> $user_data
     * @return User
     */
    public static function findOrCreate(array $user_data): User {
        $user = User::firstWhere('twitch_id', $user_data['id']);
        if ($user === null) {
            $user = User::firstWhere('email', $user_data['email']);
            // If load the user, and it does not have a twitch id then we want to assign it the twitch id
            if ($user !== null && $user->twitch_id === null) {
                $user->twitch_id = $user_data['id'];
                $user->save();
            }
        }
        if ($user === null) {
            $user = UserCreator::create(
                display_name: $user_data['display_name'],
                email: $user_data['email'],
                twitch_id: $user_data['id'],
            );
        }
        return $user;
    }
}