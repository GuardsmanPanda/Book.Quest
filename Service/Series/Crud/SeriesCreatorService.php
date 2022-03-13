<?php

namespace Service\Series\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\App\Enum\WorldTypeEnum;
use Domain\App\Model\Uri;
use Domain\Series\Crud\SeriesCreator;
use Domain\Series\Crud\SeriesUriCreator;
use Domain\Series\Model\Series;
use Domain\Universe\Model\Universe;
use Infrastructure\Http\Service\Req;

class SeriesCreatorService {
    public static function createFromRequest(): Series {
        $res = SeriesCreator::create(
            series_name: Req::getString('series_name'),
            time_period: TimePeriodEnum::from(Req::getString('time_period')),
            world_type: WorldTypeEnum::from(Req::getString('world_type')),
            universe: Universe::find(Req::getString('universe_id')),
        );

        if (Req::has('wikipedia_uri')) {
            SeriesUriCreator::create(
                series: $res,
                uri: Uri::find('wikipedia'),
                series_uri: Req::getString('wikipedia_uri'),
            );
        }

        if (Req::has('goodreads_uri')) {
            SeriesUriCreator::create(
                series: $res,
                uri: Uri::find('goodreads'),
                series_uri: Req::getString('goodreads_uri'),
            );
        }
        return $res;
    }
}