<?php

namespace Domain\Narrator\Model;

use Carbon\CarbonInterface;
use Closure;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Narrator|null find(string $id, array $columns = ['*'])
 * @method static Narrator findOrFail(string $id, array $columns = ['*'])
 * @method static Narrator sole(array $columns = ['*'])
 * @method static Narrator|null first(array $columns = ['*'])
 * @method static Narrator firstOrFail(array $columns = ['*'])
 * @method static Narrator firstOrCreate(array $filter, array $values)
 * @method static Narrator firstOrNew(array $filter, array $values)
 * @method static Narrator|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Collection|Narrator all(array $columns = ['*'])
 * @method static Collection|Narrator fromQuery(string $query, array $bindings = [])
 * @method static Builder|Narrator lockForUpdate()
 * @method static Builder|Narrator select(array $columns = ['*'])
 * @method static Builder|Narrator with(array  $relations)
 * @method static Builder|Narrator leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Narrator where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Narrator whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Builder|Narrator whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Builder|Narrator whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Narrator whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Narrator whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Narrator whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Narrator whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Builder|Narrator orderBy(string $column, string $direction = 'asc')
 * @method static int count(array $columns = ['*'])
 *
 * @property string $id
 * @property string $narrator_name
 * @property string $narrator_slug
 * @property string $narrator_short_url_code
 * @property string|null $birth_country_iso2_code
 * @property string|null $primary_language_iso2_code
 * @property CarbonInterface|null $birth_date
 * @property CarbonInterface|null $death_date
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Narrator extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'narrator';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';

    /** @var array<string, string> $casts */
    protected $casts = [
        'birth_date' => 'immutable_date',
        'created_at' => 'immutable_datetime',
        'death_date' => 'immutable_date',
        'updated_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];
}
