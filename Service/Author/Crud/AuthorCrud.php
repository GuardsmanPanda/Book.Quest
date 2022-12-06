<?php

namespace Service\Author\Crud;

use Domain\Author\Crud\AuthorCreator;
use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;

class AuthorCrud {
    public static function createFromRequest(): Author {
        return AuthorCreator::create(
            author_name: Req::getString('author_name'),
            birth_date: Req::getDate('birth_Date'),
            birth_country_iso2_code: Req::getString('birth_country_iso2_code'),
            death_date: Req::getDate('death_date'),
            primary_language_iso2_code: Req::getString('primary_language_iso2_code'),
        );
    }
}
