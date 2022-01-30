<?php

namespace Domain\Universe\Crud;

use Domain\App\Enum\WorldTypeEnum;
use Domain\Universe\Model\Universe;
use Infrastructure\App\Service\ShortUrlCodeService;

class UniverseCreator {
    public function create(
        string $universe_name,
        WorldTypeEnum $world_type,
        string $wikipedia_url,
    ): Universe {
        $tmp = new Universe();
        $tmp->universe_name = $universe_name;
        $tmp->universe_short_url_code = ShortUrlCodeService::generateCode();
        $tmp->world_type = $world_type;
        $tmp->wikipedia_url = $wikipedia_url;
        $tmp->save();
        return $tmp;
    }
}