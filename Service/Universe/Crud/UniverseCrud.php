<?php

namespace Service\Universe\Crud;

use Domain\Universe\Crud\UniverseCreator;
use Domain\Universe\Model\Universe;
use Domain\Uri\Crud\UriCreator;
use Domain\Uri\Enum\UriTypeEnum;
use Domain\Uri\Model\UriSource;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;

class UniverseCrud {
    public static function createFromRequest(): Universe {
        $res = UniverseCreator::create(
            universe_name: Req::getString('universe_name'),
            world_type: Req::getString('world_type')
        );
        UriCreator::create(
            uri_target: Req::getString('wikipedia_url'),
            uri_type: UriTypeEnum::UNIVERSE,
            uri_source: UriSource::find('WIKIPEDIA')
        );
        return $res;
    }
}