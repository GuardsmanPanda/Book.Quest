<?php declare(strict_types=1);

namespace Domain\Universe\Crud;

use Domain\Universe\Model\Universe;
use GuardsmanPanda\Larabear\Infrastructure\App\Service\BearShortUrlCodeService;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use Illuminate\Support\Str;
use RuntimeException;

class UniverseCreator {
    public static function create(
        string $universe_name,
        string $world_type
    ): Universe {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
        $model = new Universe();
        $model->id = Str::uuid()->toString();

        $model->universe_name = $universe_name;
        $model->universe_slug = Str::slug($universe_name);
        $model->universe_short_url_code = BearShortUrlCodeService::generateNextCode();
        $model->world_type = $world_type;

        $model->save();
        return $model->fresh();
    }
}
