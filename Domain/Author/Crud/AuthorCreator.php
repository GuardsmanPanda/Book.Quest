<?php

namespace Domain\Author\Crud;

use Carbon\CarbonInterface;
use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Infrastructure\App\Service\BearShortUrlCodeService;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use Illuminate\Support\Str;
use RuntimeException;

class AuthorCreator {
    public static function create(
        string $author_name,
        CarbonInterface $birth_date = null,
        string $birth_country_iso2_code = null,
        CarbonInterface $death_date = null,
        string $primary_language_iso2_code = null
    ): Author {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
        $model = new Author();
        $model->id = Str::uuid()->toString();

        $model->author_name = $author_name;
        $model->author_slug = Str::slug($author_name);
        $model->author_short_url_code = BearShortUrlCodeService::generateNextCode();
        $model->birth_date = $birth_date;
        $model->birth_country_iso2_code = $birth_country_iso2_code;
        $model->death_date = $death_date;
        $model->primary_language_iso2_code = $primary_language_iso2_code;

        $model->save();
        return $model->fresh();
    }
}
