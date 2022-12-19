<?php declare(strict_types=1);

namespace Domain\Universe\Model;

use Closure;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Universe|null find(string $id, array $columns = ['*'])
 * @method static Universe findOrFail(string $id, array $columns = ['*'])
 * @method static Universe sole(array $columns = ['*'])
 * @method static Universe|null first(array $columns = ['*'])
 * @method static Universe firstOrFail(array $columns = ['*'])
 * @method static Universe firstOrCreate(array $filter, array $values)
 * @method static Universe firstOrNew(array $filter, array $values)
 * @method static Universe|null firstWhere(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Collection all(array $columns = ['*'])
 * @method static Collection get(array $columns = ['*'])
 * @method static Collection fromQuery(string $query, array $bindings = [])
 * @method static Universe lockForUpdate()
 * @method static Universe select(array $columns = ['*'])
 * @method static Universe with(array $relations)
 * @method static Universe leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Universe where(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Universe whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Universe whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Universe whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Universe whereDoesntHave(string $relation, Closure $callback = null)
 * @method static Universe withWhereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Universe whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Universe whereNull(string|array $columns, string $boolean = 'and')
 * @method static Universe whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Universe whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Universe orderBy(string $column, string $direction = 'asc')
 * @method static Universe orderByDesc(string $column)
 * @method static Universe limit(int $value)
 * @method static int count(array $columns = ['*'])
 * @method static mixed sum(string $column)
 * @method static bool exists()
 *
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $world_type
 * @property string $universe_name
 * @property string $universe_slug
 * @property string $universe_short_url_code
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Universe extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'universe';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];
}
