<?php

namespace Service\Narrator\Crud;

use Domain\App\Model\Country;
use Domain\App\Model\Language;
use Domain\Narrator\Crud\NarratorCreator;
use Domain\Narrator\Model\Narrator;
use Domain\Uri\Crud\UriCreator;
use Domain\Uri\Enum\UriTypeEnum;
use Domain\Uri\Model\UriSource;
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
            UriCreator::create(
                uri_target: Req::getString('wikipedia_uri'),
                uri_type: UriTypeEnum::from('NARRATOR'),
                uri_source: UriSource::find('WIKIPEDIA'),
            );
        }
        return $result;
    }
}