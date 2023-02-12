<?php declare(strict_types=1);

namespace Domain\Series\Crud;

use Domain\Series\Model\Series;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

final class SeriesDeleter {
    public static function delete(Series $model): void {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
        $model->delete();
    }

    public static function deleteFromId(string $id): void {
        self::delete(model: Series::where(column: 'id', operator:'=', value: $id)->sole());
    }
}
