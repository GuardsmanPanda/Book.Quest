<?php declare(strict_types=1);

namespace Domain\Author\Crud;

use Carbon\CarbonInterface;
use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDatabaseService;

class AuthorUpdater {
    public function __construct(private readonly Author $model) {
        BearDatabaseService::mustBeInTransaction();
        BearDatabaseService::mustBeProperHttpMethod(verbs: ['PATCH']);
    }

    public static function fromId(string $id): self {
        return new self(model: Author::findOrFail(id: $id));
    }


    public function setAuthorName(string $author_name): self {
        $this->model->author_name = $author_name;
        return $this;
    }

    public function setAuthorSlug(string $author_slug): self {
        $this->model->author_slug = $author_slug;
        return $this;
    }

    public function setBirthDate(CarbonInterface|null $birth_date): self {
        if ($birth_date?->toDateString() === $this->model->birth_date?->toDateString()) {
            return $this;
        }
        $this->model->birth_date = $birth_date;
        return $this;
    }

    public function setBirthCountryIso2Code(string|null $birth_country_iso2_code): self {
        $this->model->birth_country_iso2_code = $birth_country_iso2_code;
        return $this;
    }

    public function setDeathDate(CarbonInterface|null $death_date): self {
        if ($death_date?->toDateString() === $this->model->death_date?->toDateString()) {
            return $this;
        }
        $this->model->death_date = $death_date;
        return $this;
    }

    public function setPrimaryLanguageIso2Code(string|null $primary_language_iso2_code): self {
        $this->model->primary_language_iso2_code = $primary_language_iso2_code;
        return $this;
    }

    public function update(): Author {
        $this->model->save();
        return $this->model;
    }
}
