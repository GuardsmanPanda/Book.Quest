<?php

namespace Service\Universe\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\App\Model\Uri;
use Domain\Universe\Crud\UniverseCreator;
use Domain\Universe\Crud\UniverseUriCreator;
use Domain\Universe\Model\Universe;
use Infrastructure\Http\Service\Req;

class UniverseCreatorService {
    public static function createFromRequest(): Universe {
        $res = UniverseCreator::create(
            universe_name: Req::getString('universe_name'),
            world_type: TimePeriodEnum::from(Req::getString('world_type'))
        );
        UniverseUriCreator::create(
            uri: Uri::find('wikipedia'),
            universe: $res,
            universe_uri: Req::getString('wikipedia_url'),
        );
        return $res;
    }
}