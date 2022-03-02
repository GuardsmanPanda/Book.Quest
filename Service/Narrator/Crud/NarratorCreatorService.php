<?php

namespace Service\Narrator\Crud;

use Domain\App\Model\Country;
use Domain\App\Model\Language;
use Domain\App\Model\Uri;
use Domain\Narrator\Crud\NarratorCreator;
use Domain\Narrator\Crud\NarratorUriCreator;
use Domain\Narrator\Model\Narrator;
use Illuminate\Support\Facades\DB;
use Infrastructure\Http\Service\Req;
use RuntimeException;

class NarratorCreatorService {
    public static function createFromRequest(): Narrator {
        try {
            DB::beginTransaction();
            $result = NarratorCreator::create(
                narrator_name: Req::getString('narrator_name'),
                birth_country: Country::find(Req::getString('birth_country_id')),
                primary_language: Language::find(Req::getString('primary_language_id')),
                birth_date: Req::getDate('birth_date'),
                death_date: Req::getDate('death_date'),
            );

            if (Req::has('wikipedia_uri')) {
                NarratorUriCreator::create(
                    narrator: $result,
                    uri: Uri::find('wikipedia'),
                    narrator_uri: Req::getString('wikipedia_uri'),
                );
            }

            DB::commit();
            return $result;
        } catch (\Throwable $t) {
            DB::rollBack();
            throw new RuntimeException('Could not create series: ' . $t->getMessage(), 500, $t);
        }
    }
}