<?php

namespace Service\Series\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\App\Enum\WorldTypeEnum;
use Domain\Series\Crud\SeriesCreator;
use Domain\Series\Model\Series;
use Domain\Universe\Model\Universe;
use Domain\Uri\Crud\UriCreator;
use Domain\Uri\Enum\UriTypeEnum;
use Domain\Uri\Model\UriSource;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;

class SeriesCrud {
    public static function createFromRequest(): Series {
        $res = SeriesCreator::create(
            series_name: Req::getString('series_name'),
            world_type: Req::getString('world_type'),
            universe_id: Req::getString('universe_id'),
        );

        if (Req::has('wikipedia_uri')) {
            UriCreator::create(
                uri_target: Req::getString('wikipedia_uri'),
                uri_type: UriTypeEnum::from('SERIES'),
                uri_source: UriSource::find('WIKIPEDIA'),
            );
        }

        if (Req::has('goodreads_uri')) {
            UriCreator::create(
                uri_target: Req::getString('goodreads_uri'),
                uri_type: UriTypeEnum::from('SERIES'),
                uri_source: UriSource::find('GOODREADS'),
            );
        }
        return $res;
    }
}