<?php

namespace Service\Author\Crud;

use Domain\App\Model\Country;
use Domain\App\Model\Language;
use Domain\Author\Crud\AuthorCreator;
use Domain\Author\Model\Author;
use Illuminate\Support\Facades\DB;
use Infrastructure\Http\Service\Req;
use RuntimeException;
use Throwable;

class AuthorCreationService {
    public static function createFromRequest(): Author {
        try {
            DB::beginTransaction();
            $res = AuthorCreator::create(
                author_name: Req::getString('author_name'),
                birth_year: Req::getInt('birth_year'),
                birth_date: Req::getDate('birth_Date'),
                death_date: Req::getDate('death_date'),
                birth_country: Country::find(Req::getString('birth_country_id')),
                primary_language: Language::find(Req::getString('primary_language_id')),
            );
            DB::commit();
            return $res;
        } catch (Throwable $t) {
            DB::rollBack();
            throw new RuntimeException('Could not create author: ' . $t->getMessage(), 500, $t);
        }
    }
}