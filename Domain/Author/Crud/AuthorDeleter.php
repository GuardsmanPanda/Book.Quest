<?php declare(strict_types=1);

namespace Domain\Author\Crud;

use Domain\Author\Model\Author;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDatabaseService;

class AuthorDeleter {
    public static function delete(Author $model): void {
        BearDatabaseService::mustBeInTransaction();
        BearDatabaseService::mustBeProperHttpMethod(verbs: ['DELETE']);
        $model->delete();
    }

    public static function deleteFromId(string $id): void {
        self::delete(model: Author::findOrFail(id: $id));
    }
}
