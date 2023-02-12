<?php declare(strict_types=1);

namespace Domain\Universe\Crud;

use Domain\Universe\Model\Universe;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

final class UniverseUpdater {
    public function __construct(private readonly Universe $model) {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
    }

    public static function fromId(string $id): UniverseUpdater {
        return new UniverseUpdater(model: Universe::where(column: 'id', operator:'=', value: $id)->sole());
    }


    public function setUniverseName(string $universe_name): void {
        $this->model->universe_name = $universe_name;
    }

    public function setUniverseSlug(string $universe_slug): void {
        $this->model->universe_slug = $universe_slug;
    }

    public function setUniverseShortUrlCode(string $universe_short_url_code): void {
        $this->model->universe_short_url_code = $universe_short_url_code;
    }

    public function setWorldType(string $world_type): void {
        $this->model->world_type = $world_type;
    }

    public function save(): Universe {
        $this->model->save();
        return $this->model;
    }
}
