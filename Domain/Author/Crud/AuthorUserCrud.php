<?php

namespace Domain\Author\Crud;

use Domain\Author\Model\Author;
use Domain\User\Model\User;
use Illuminate\Support\Facades\DB;

class AuthorUserCrud {
    public static function createOrUpdateStatus(User $user, Author $author, string $status): void {
        DB::statement("
            INSERT INTO author_user (author_id, user_id, status) VALUES(?, ?, ?)
            ON DUPLICATE KEY UPDATE status = excluded.status
        ", [$author->id, $user->id, $status]);
    }
}