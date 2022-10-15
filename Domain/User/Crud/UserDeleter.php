<?php

namespace Domain\User\Crud;

use Domain\User\Model\User;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

class UserDeleter {
    public static function delete(User $model): void {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
        $model->delete();
    }

    public static function deleteFromId(string $id): void {
        self::delete(model: User::where(column: 'id', operator:'=', value: $id)->sole());
    }
}
