<?php

namespace Service\Series\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\App\Model\Uri;
use Domain\Series\Crud\SeriesCreator;
use Domain\Series\Crud\SeriesUriCreator;
use Domain\Series\Model\Series;
use Illuminate\Support\Facades\DB;
use Infrastructure\Http\Service\Req;
use RuntimeException;
use Throwable;

class SeriesCreatorService {
    public static function createFromRequest(): Series {
        try {
            DB::beginTransaction();
            $res = SeriesCreator::create(
                series_name: Req::getString('series_name'),
                universe_id: Req::getString('universe_id'),
                time_period: TimePeriodEnum::from(Req::getString('time_period')),
            );
            SeriesUriCreator::create(
                series: $res,
                uri: Uri::find('wikipedia'),
                series_uri: Req::getString('wikipedia_uri'),
            );
            DB::commit();
            return $res;
        } catch (Throwable $t) {
            DB::rollBack();
            throw new RuntimeException('Could not create universe: ' . $t->getMessage(), 500, $t);
        }
    }
}