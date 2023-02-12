<?php declare(strict_types=1);

namespace Domain\Narrator\Crud;

use Carbon\CarbonInterface;
use Domain\Narrator\Model\Narrator;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

final class NarratorUpdater {
    public function __construct(private readonly Narrator $model) {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
    }

    public static function fromId(string $id): NarratorUpdater {
        return new NarratorUpdater(model: Narrator::where(column: 'id', operator:'=', value: $id)->sole());
    }


    public function setNarratorName(string $narrator_name): void {
        $this->model->narrator_name = $narrator_name;
    }

    public function setNarratorSlug(string $narrator_slug): void {
        $this->model->narrator_slug = $narrator_slug;
    }

    public function setNarratorShortUrlCode(string $narrator_short_url_code): void {
        $this->model->narrator_short_url_code = $narrator_short_url_code;
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

    public function save(): Narrator {
        $this->model->save();
        return $this->model;
    }
}
