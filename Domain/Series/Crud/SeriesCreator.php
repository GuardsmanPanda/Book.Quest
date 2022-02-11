<?php

namespace Domain\Series\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\App\Enum\WorldTypeEnum;
use Domain\Series\Model\Series;
use Domain\Universe\Model\Universe;
use Illuminate\Support\Str;
use Infrastructure\App\Service\ShortUrlCodeService;

class SeriesCreator {
    public static function create(
        string $series_name,
        TimePeriodEnum $time_period,
        WorldTypeEnum $world_type,
        ?Universe $universe = null,
    ): Series {
        $series = new Series();
        $series->series_name = $series_name;
        $series->universe_id = $universe?->id;
        $series->time_period_id = $time_period->value;
        $series->world_type = $world_type->value;
        $series->series_slug = Str::slug($series_name);
        $series->series_short_url_code = ShortUrlCodeService::generateCode();
        $series->save();
        return $series;
    }
}