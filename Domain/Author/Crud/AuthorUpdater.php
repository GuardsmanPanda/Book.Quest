<?php

namespace Domain\Author\Crud;

use Carbon\CarbonInterface;
use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

class AuthorUpdater {
    public function __construct(private readonly Author $model) {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
    }

    public static function fromId(string $id): AuthorUpdater {
        return new AuthorUpdater(model: Author::where(column: 'id', operator:'=', value: $id)->sole());
    }


    public function setAuthorName(string $author_name): void {
        $this->model->author_name = $author_name;
    }

    public function setAuthorSlug(string $author_slug): void {
        $this->model->author_slug = $author_slug;
    }

    public function setAuthorShortUrlCode(string $author_short_url_code): void {
        $this->model->author_short_url_code = $author_short_url_code;
    }

    public function setAuthorFollowers(int $author_followers): void {
        $this->model->author_followers = $author_followers;
    }

    public function setBirthDate(CarbonInterface|null $birth_date): void {
        if ($birth_date?->toDateString() === $this->model->birth_date?->toDateString()) {
            return;
        }
        $this->model->birth_date = $birth_date;
    }

    public function setBirthCountryIso2Code(string|null $birth_country_iso2_code): void {
        $this->model->birth_country_iso2_code = $birth_country_iso2_code;
    }

    public function setDeathDate(CarbonInterface|null $death_date): void {
        if ($death_date?->toDateString() === $this->model->death_date?->toDateString()) {
            return;
        }
        $this->model->death_date = $death_date;
    }

    public function setPrimaryLanguageIso2Code(string|null $primary_language_iso2_code): void {
        $this->model->primary_language_iso2_code = $primary_language_iso2_code;
    }

    public function save(): Author {
        $this->model->save();
        return $this->model;
    }
}
