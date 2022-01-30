<?php

namespace Domain\Author\Crud;

use Carbon\Carbon;
use Domain\Author\Model\Author;
use Illuminate\Support\Str;
use Infrastructure\App\Model\Country;
use Infrastructure\App\Model\Language;
use Infrastructure\App\Service\ShortUrlCodeService;

class AuthorCreator {
    public static function create(
        string $author_name,
        string $goodreads_url,
        int $birth_year=null,
        Carbon $birth_date = null,
        Carbon $death_date = null,
        Country $birth_country = null,
        Language $primary_language = null,
    ): Author {
        $author = new Author();
        $author->author_name = $author_name;
        $author->goodreads_url = $goodreads_url;
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