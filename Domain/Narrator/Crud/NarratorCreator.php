<?php

namespace Domain\Narrator\Crud;

use Carbon\CarbonInterface;
use Domain\App\Model\Country;
use Domain\App\Model\Language;
use Domain\Narrator\Model\Narrator;
use Illuminate\Support\Str;
use Infrastructure\App\Service\ShortUrlCodeService;

class NarratorCreator {
    public static function create (
        string $narrator_name,
        CarbonInterface $birth_date,
        Country $birth_country,
        Language $primary_language,
        ?CarbonInterface $death_date = null
    ): Narrator {
       $narrator = new Narrator();
       $narrator->narrator_name = $narrator_name;
       $narrator->narrator_slug = Str::slug($narrator_name);
       $narrator->narrator_short_url_code = ShortUrlCodeService::generateCode();
       $narrator->birth_date = $birth_date;
       $narrator->birth_country_id = $birth_country->id;
       $narrator->primary_language_id = $primary_language->id;
       $narrator->death_date = $death_date;
       $narrator->save();
       return $narrator;
    }
}