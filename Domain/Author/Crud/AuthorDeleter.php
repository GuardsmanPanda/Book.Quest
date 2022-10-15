<?php

namespace Domain\Author\Crud;

use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use RuntimeException;

class AuthorDeleter {
    public static function delete(Author $model): void {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
        $model->delete();
    }

    public static function deleteFromId(string $id): void {
        self::delete(model: Author::where(column: 'id', operator:'=', value: $id)->sole());
    }
}
