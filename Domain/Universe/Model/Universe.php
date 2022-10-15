<?php

namespace Domain\Universe\Model;

use Carbon\CarbonInterface;
use Closure;
use GuardsmanPanda\Larabear\Enum\BearSeverityEnum;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use GuardsmanPanda\Larabear\Infrastructure\Error\Crud\BearLogErrorCreator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use RuntimeException;

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
 * @method static Universe|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Collection|Universe all(array $columns = ['*'])
 * @method static Collection|Universe fromQuery(string $query, array $bindings = [])
 * @method static Builder|Universe lockForUpdate()
 * @method static Builder|Universe select(array $columns = ['*'])
 * @method static Builder|Universe with(array  $relations)
 * @method static Builder|Universe leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Universe where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Universe whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Builder|Universe whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Builder|Universe whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Universe whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Universe whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Universe whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Universe whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Builder|Universe orderBy(string $column, string $direction = 'asc')
 *
 * @property string $id
 * @property string $world_type
 * @property string $universe_name
 * @property string $universe_slug
 * @property string $universe_short_url_code
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Universe extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'universe';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';

    /** @var array<string, string> $casts */
    protected $casts = [
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];

    public function getAttribute($key) {
        $resp =  parent::getAttribute($key);
        if ($resp !== null || array_key_exists(key: $key, array: $this->attributes) || array_key_exists(key: $key, array: $this->relations)) {
            return $resp;
        }
        BearLogErrorCreator::create(
            message: "Attribute $key not loaded on " . static::class,
            namespace: "larabear",
            key: "attribute_not_loaded",
            severity: BearSeverityEnum::CRITICAL,
            remedy: "Make sure to include used attributes in the SELECT statement",
        );
        throw new RuntimeException(message: "Attribute $key not loaded on " . static::class);
    }
}
