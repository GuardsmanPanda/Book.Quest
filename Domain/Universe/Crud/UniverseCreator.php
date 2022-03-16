<?php

namespace Domain\Universe\Crud;

use Domain\App\Enum\TimePeriodEnum;
use Domain\App\Enum\WorldTypeEnum;
use Domain\Universe\Model\Universe;
use Illuminate\Support\Str;
use Infrastructure\App\Service\ShortUrlCodeService;

class UniverseCreator {
    public static function create(
        string $universe_name,
        WorldTypeEnum $world_type,
    ): Universe {
        $tmp = new Universe();
        $tmp->universe_name = $universe_name;
        $tmp->universe_short_url_code = ShortUrlCodeService::generateCode();
        $tmp->universe_slug = Str::slug($universe_name);
        $tmp->world_type = $world_type->value;
        $tmp->save();
        return $tmp;
    }
}