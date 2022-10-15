<?php

namespace Service\Author\Crud;

use Domain\Author\Enum\AuthorUserStatus;
use Domain\Author\Model\Author;
use Domain\Author\Service\AuthorUserService;
use Infrastructure\Auth\Service\Auth;

class AuthorUserCrud {
    public static function crud(Author $author, AuthorUserStatus $status): void {
        AuthorUserService::createOrUpdateStatus(user: Auth::user(), author: $author, status: $status);
    }
}
