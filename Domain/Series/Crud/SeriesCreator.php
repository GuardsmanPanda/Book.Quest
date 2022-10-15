<?php

namespace Domain\Series\Crud;

use Domain\Series\Model\Series;
use GuardsmanPanda\Larabear\Infrastructure\App\Service\BearShortUrlCodeService;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use Illuminate\Support\Str;
use RuntimeException;

class SeriesCreator {
    public static function create(
        string $series_name,
        string $world_type,
        string $universe_id = null
    ): Series {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
        $model = new Series();
        $model->id = Str::uuid()->toString();

        $model->series_name = $series_name;
        $model->series_slug = Str::slug($series_name);
        $model->series_short_url_code = BearShortUrlCodeService::generateNextCode();
        $model->world_type = $world_type;
        $model->universe_id = $universe_id;

        $model->save();
        return $model->fresh();
    }
}
