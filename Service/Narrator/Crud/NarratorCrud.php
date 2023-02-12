<?php declare(strict_types=1);

namespace Service\Narrator\Crud;

use Domain\Narrator\Crud\NarratorCreator;
use Domain\Narrator\Model\Narrator;
use Domain\Uri\Crud\UriCreator;
use Domain\Uri\Enum\UriTypeEnum;
use Domain\Uri\Model\UriSource;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;

final class NarratorCrud {
    public static function createFromRequest(): Narrator {
        $result = NarratorCreator::create(
            narrator_name: Req::getString('narrator_name'),
            birth_date: Req::getDate('birth_date'),
            birth_country_iso2_code: Req::getString('birth_country_iso2_code'),
            death_date: Req::getDate('death_date'),
            primary_language_iso2_code: Req::getString('primary_language_iso2_code'),
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
