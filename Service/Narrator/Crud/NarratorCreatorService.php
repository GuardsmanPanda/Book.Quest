<?php

namespace Service\Narrator\Crud;

use Domain\App\Model\Country;
use Domain\App\Model\Language;
use Domain\App\Model\Uri;
use Domain\Narrator\Crud\NarratorCreator;
use Domain\Narrator\Crud\NarratorUriCreator;
use Domain\Narrator\Model\Narrator;
use Infrastructure\Http\Service\Req;

class NarratorCreatorService {
    public static function createFromRequest(): Narrator {
        $result = NarratorCreator::create(
            narrator_name: Req::getString('narrator_name'),
            primary_language: Language::find(Req::getString('primary_language_id')),
            birth_country: Country::find(Req::getString('birth_country_id')),
            birth_date: Req::getDate('birth_date'),
            death_date: Req::getDate('death_date'),
        );

        if (Req::has('wikipedia_uri')) {
            NarratorUriCreator::create(
                narrator: $result,
                uri: Uri::find('wikipedia'),
                narrator_uri: Req::getString('wikipedia_uri'),
            );
        }
        return $result;
    }
}