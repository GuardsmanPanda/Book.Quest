<?php declare(strict_types=1);

namespace Domain\Universe\Crud;

use Domain\Universe\Model\Universe;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

class UniverseDeleter {
    public static function delete(Universe $model): void {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
        $model->delete();
    }

    public static function deleteFromId(string $id): void {
        self::delete(model: Universe::where(column: 'id', operator:'=', value: $id)->sole());
    }
}
