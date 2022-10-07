<?php

namespace Domain\User\Model;

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
 * @method static User|null find(string $id, array $columns = ['*'])
 * @method static User findOrFail(string $id, array $columns = ['*'])
 * @method static User sole(array $columns = ['*'])
 * @method static User|null first(array $columns = ['*'])
 * @method static User firstOrFail(array $columns = ['*'])
 * @method static User firstOrCreate(array $filter, array $values)
 * @method static User firstOrNew(array $filter, array $values)
 * @method static User|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Collection|User all(array $columns = ['*'])
 * @method static Collection|User fromQuery(string $query, array $bindings = [])
 * @method static Builder|User lockForUpdate()
 * @method static Builder|User select(array $columns = ['*'])
 * @method static Builder|User with(array  $relations)
 * @method static Builder|User leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|User where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|User whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Builder|User whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Builder|User whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|User whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|User whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|User whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|User whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Builder|User orderBy(string $column, string $direction = 'asc')
 *
 * @property int|null $twitch_id
 * @property string $id
 * @property string $email
 * @property string $display_name
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class User extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'users';
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
