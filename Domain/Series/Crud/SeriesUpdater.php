<?php

namespace Domain\Series\Crud;

use Domain\Series\Model\Series;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

class SeriesUpdater {
    public function __construct(private readonly Series $model) {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
    }

    public static function fromId(string $id): SeriesUpdater {
        return new SeriesUpdater(model: Series::where(column: 'id', operator:'=', value: $id)->sole());
    }


    public function setSeriesName(string $series_name): void {
        $this->model->series_name = $series_name;
    }

    public function setSeriesSlug(string $series_slug): void {
        $this->model->series_slug = $series_slug;
    }

    public function setSeriesShortUrlCode(string $series_short_url_code): void {
        $this->model->series_short_url_code = $series_short_url_code;
    }

    public function setWorldType(string $world_type): void {
        $this->model->world_type = $world_type;
    }

    public function setUniverseId(string|null $universe_id): void {
        $this->model->universe_id = $universe_id;
    }

    public function save(): Series {
        $this->model->save();
        return $this->model;
    }
}
