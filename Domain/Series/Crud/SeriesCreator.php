<?php

namespace Domain\Series\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\Series\Model\Series;
use Illuminate\Support\Str;
use Infrastructure\App\Service\ShortUrlCodeService;

class SeriesCreator {
    public static function create(
        string $series_name,
        ?string $universe_id,
        TimePeriodEnum $time_period,
    ): Series {
        $series = new Series();
        $series->series_name = $series_name;
        $series->universe_id = $universe_id;
        $series->time_period_id = $time_period->value;
        $series->series_slug = Str::slug($series_name);
        $series->series_short_url_code = ShortUrlCodeService::generateCode();
        $series->save();
        return $series;
    }
}