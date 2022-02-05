<?php

namespace Service\Universe\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\App\Model\Uri;
use Domain\Universe\Crud\UniverseCreator;
use Domain\Universe\Crud\UniverseUriCreator;
use Domain\Universe\Model\Universe;
use Illuminate\Support\Facades\DB;
use Infrastructure\Http\Service\Req;
use RuntimeException;
use Throwable;

class UniverseCreatorService {
    public static function createFromRequest(): Universe {
        try {
            DB::beginTransaction();
            $res = UniverseCreator::create(
                universe_name: Req::getString('universe_name'),
                world_type: TimePeriodEnum::from(Req::getString('world_type'))
            );
            UniverseUriCreator::create(
                uri: Uri::find('wikipedia'),
                universe: $res,
                universe_uri: Req::getString('wikipedia_url'),
            );
            DB::commit();
            return $res;
        } catch (Throwable $t) {
            DB::rollBack();
            throw new RuntimeException('Could not create universe: ' . $t->getMessage(), 500, $t);
        }
    }
}