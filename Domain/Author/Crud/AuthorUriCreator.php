<?php

namespace Domain\Author\Crud;

use Domain\App\Model\Uri;
use Domain\Author\Model\Author;
use Domain\Author\Model\AuthorUri;

class AuthorUriCreator {
    public static function create(
        Author $author,
        Uri $uri,
        string $author_uri,
        ?string $author_uri_description = null
    ): AuthorUri {
        $uu = new AuthorUri();
        $uu->author_id = $author->id;
        $uu->uri_id = $uri->id;
        $uu->author_uri = $author_uri;
        $uu->author_uri_description = $author_uri_description;
        $uu->save();
        return $uu;
    }
}
