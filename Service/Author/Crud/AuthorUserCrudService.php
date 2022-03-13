<?php

namespace Service\Author\Crud;

use Domain\Author\Crud\AuthorUserCrud;
use Domain\Author\Enum\AuthorUserStatus;
use Domain\Author\Model\Author;
use Infrastructure\Auth\Service\Auth;

class AuthorUserCrudService {
    public static function crud(Author $author, AuthorUserStatus $status): void {
        if ($status === AuthorUserStatus::DEFAULT) {
            AuthorUserCrud::delete(user: Auth::user(), author: $author);
        } else {
            AuthorUserCrud::createOrUpdateStatus(user: Auth::user(), author: $author, status: $status);
        }
    }
}