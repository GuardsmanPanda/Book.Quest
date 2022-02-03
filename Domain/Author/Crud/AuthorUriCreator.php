<?php

namespace Domain\Author\Crud;

use Domain\Author\Model\Author;
use Domain\Author\Model\AuthorUri;

class AuthorUriCreator {
    public static function create(
        Author $author,

    ): Author {
        $uri = new AuthorUri();

        $uri->save();
        return $uri;
    }
}