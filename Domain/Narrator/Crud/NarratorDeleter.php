<?php

namespace Domain\Narrator\Crud;

use Domain\Narrator\Model\Narrator;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

class NarratorDeleter {
    public static function delete(Narrator $model): void {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
        $model->delete();
    }

    public static function deleteFromId(string $id): void {
        self::delete(model: Narrator::where(column: 'id', operator:'=', value: $id)->sole());
    }
}
