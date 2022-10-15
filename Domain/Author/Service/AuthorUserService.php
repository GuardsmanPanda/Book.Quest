<?php

namespace Domain\Author\Service;

use Domain\Author\Enum\AuthorUserStatus;
use Domain\Author\Model\Author;
use Domain\User\Model\User;
use Illuminate\Support\Facades\DB;

class AuthorUserService {
    public static function createOrUpdateStatus(User $user, Author $author, AuthorUserStatus $status): void {
        DB::statement("
            INSERT INTO author_user (author_id, user_id, status) VALUES (?, ?, ?)
            ON CONFLICT (author_id, user_id) DO UPDATE SET status = excluded.status, updated_at = now()
        ", [$author->id, $user->id, $status->value]);
    }

    public static function delete(User $user, Author $author): void {
        DB::statement("
            DELETE FROM author_user WHERE author_id = ? AND user_id = ?
        ", [$author->id, $user->id]);
    }
}