<?php

namespace Domain\Author\Crud;

use Carbon\CarbonInterface;
use Domain\App\Model\Country;
use Domain\App\Model\Language;
use Domain\Author\Model\Author;
use Illuminate\Support\Str;
use Infrastructure\App\Service\ShortUrlCodeService;

class AuthorCreator {
    public static function create(
        string $author_name,
        int $birth_year = null,
        CarbonInterface $birth_date = null,
        CarbonInterface $death_date = null,
        Country $birth_country = null,
        Language $primary_language = null,
    ): Author {
        $author = new Author();
        $author->author_name = $author_name;
        $author->death_date = $death_date;
        $author->birth_date = $birth_date;
        $author->birth_year = $birth_year;
        $author->birth_country_id = $birth_country?->id;
        $author->primary_language_id = $primary_language?->id;
        $author->author_short_url_code = ShortUrlCodeService::generateCode();
        $author->author_slug = Str::slug($author_name);
        $author->save();
        return $author;
    }
}