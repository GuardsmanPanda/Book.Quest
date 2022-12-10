<?php declare(strict_types=1);

namespace Domain\Series\Model;

use Closure;
use Domain\Universe\Model\Universe;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Series|null find(string $id, array $columns = ['*'])
 * @method static Series findOrFail(string $id, array $columns = ['*'])
 * @method static Series sole(array $columns = ['*'])
 * @method static Series|null first(array $columns = ['*'])
 * @method static Series firstOrFail(array $columns = ['*'])
 * @method static Series firstOrCreate(array $filter, array $values)
 * @method static Series firstOrNew(array $filter, array $values)
 * @method static Series|null firstWhere(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Collection|Series all(array $columns = ['*'])
 * @method static Collection|Series get(array $columns = ['*'])
 * @method static Collection|Series fromQuery(string $query, array $bindings = [])
 * @method static Series lockForUpdate()
 * @method static Series select(array $columns = ['*'])
 * @method static Series with(array $relations)
 * @method static Series leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Series where(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Series whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Series whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Series whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Series whereDoesntHave(string $relation, Closure $callback = null)
 * @method static Series withWhereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Series whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Series whereNull(string|array $columns, string $boolean = 'and')
 * @method static Series whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Series whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Series orderBy(string $column, string $direction = 'asc')
 * @method static int count(array $columns = ['*'])
 *
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $world_type
 * @property string $series_name
 * @property string $series_slug
 * @property string $series_short_url_code
 * @property string|null $universe_id
 *
 * @property Universe|null $universe
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Series extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'series';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';

    public function universe(): BelongsTo|null {
        return $this->belongsTo(related: Universe::class, foreignKey: 'universe_id', ownerKey: 'id');
    }

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];
}
