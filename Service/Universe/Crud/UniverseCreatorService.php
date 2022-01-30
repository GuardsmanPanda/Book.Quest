<?php

namespace Service\Universe\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\Universe\Crud\UniverseCreator;
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
                world_type: TimePeriodEnum::from(Req::getString('world_type')),
                wikipedia_url: Req::getString('wikipedia_url'),
            );
            DB::commit();
            return $res;
        } catch (Throwable $t) {
            DB::rollBack();
            throw new RuntimeException('Could not create universe: ' . $t->getMessage(), 500, $t);
        }
    }
}