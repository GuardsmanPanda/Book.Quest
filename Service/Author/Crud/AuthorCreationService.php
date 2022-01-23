<?php

namespace Service\Author\Crud;

use Carbon\Carbon;
use Domain\Author\Crud\AuthorCreator;
use Domain\Author\Model\Author;
use Illuminate\Support\Facades\DB;
use Infrastructure\App\Model\Country;
use Infrastructure\App\Model\Language;
use RuntimeException;
use Throwable;

class AuthorCreationService {
    public static function createAuthor(array $data): Author {
        try {
            DB::beginTransaction();
            $res = AuthorCreator::create(
                author_name: $data['author_name'],
                goodreads_url: $data['goodreads_url'],
                birth_year: $data['birth_year'],
                birth_date: Carbon::parse($data['birth_date']),
                death_date: Carbon::parse($data['death_date']),
                birth_country: Country::find($data['birth_country_id']),
                primary_language: Language::find($data['primary_language_id']),
            );
            DB::commit();
            return $res;
        } catch (Throwable $t) {
            DB::rollBack();
            throw new RuntimeException('Could not create author: ' . $t->getMessage(), 500, $t);
        }
    }
}