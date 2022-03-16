<?php

namespace Service\Universe\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\App\Enum\WorldTypeEnum;
use Domain\Universe\Crud\UniverseCreator;
use Domain\Universe\Model\Universe;
use Domain\Uri\Crud\UriCreator;
use Domain\Uri\Enum\UriTypeEnum;
use Domain\Uri\Model\UriSource;
use Infrastructure\Http\Service\Req;

class UniverseCreatorService {
    public static function createFromRequest(): Universe {
        $res = UniverseCreator::create(
            universe_name: Req::getString('universe_name'),
            world_type: WorldTypeEnum::from(Req::getString('world_type'))
        );
        UriCreator::create(
            uri_target: Req::getString('wikipedia_url'),
            uri_type: UriTypeEnum::UNIVERSE,
            uri_source: UriSource::find('WIKIPEDIA')
        );
        return $res;
    }
}