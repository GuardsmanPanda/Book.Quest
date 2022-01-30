<?php

namespace Domain\Series\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\Series\Model\Series;

class SeriesCreator {
    public static function create(
        string         $series_name,
        string         $universe_id,
        TimePeriodEnum $world_type,

    ): Series {
        $series = new Series();
        $series->save();
        return $series;
    }
}