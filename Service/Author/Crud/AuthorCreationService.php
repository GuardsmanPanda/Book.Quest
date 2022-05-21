<?php

namespace Service\Author\Crud;

use Domain\App\Model\Country;
use Domain\App\Model\Language;
use Domain\Author\Crud\AuthorCreator;
use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Service\Req;

class AuthorCreationService {
    public static function createFromRequest(): Author {
        return AuthorCreator::create(
            author_name: Req::getString('author_name'),
            birth_year: Req::getInt('birth_year'),
            birth_date: Req::getDate('birth_Date'),
            death_date: Req::getDate('death_date'),
            birth_country: Country::find(Req::getString('birth_country_id')),
            primary_language: Language::find(Req::getString('primary_language_id')),
        );
    }
}