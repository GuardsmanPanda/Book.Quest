<?php declare(strict_types=1);

namespace Domain\Narrator\Model;

use Carbon\CarbonInterface;
use Closure;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
 * @method static Narrator|null firstWhere(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Collection all(array $columns = ['*'])
 * @method static Collection get(array $columns = ['*'])
 * @method static Collection fromQuery(string $query, array $bindings = [])
 * @method static Narrator lockForUpdate()
 * @method static Narrator select(array $columns = ['*'])
 * @method static Narrator with(array $relations)
 * @method static Narrator leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Narrator where(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Narrator whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Narrator whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Narrator whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Narrator whereDoesntHave(string $relation, Closure $callback = null)
 * @method static Narrator withWhereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Narrator whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Narrator whereNull(string|array $columns, string $boolean = 'and')
 * @method static Narrator whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Narrator whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Narrator orderBy(string $column, string $direction = 'asc')
 * @method static Narrator orderByDesc(string $column)
 * @method static Narrator limit(int $value)
 * @method static int count(array $columns = ['*'])
 * @method static mixed sum(string $column)
 * @method static bool exists()
 *
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $narrator_name
 * @property string $narrator_slug
 * @property string $narrator_short_url_code
 * @property string|null $birth_country_iso2_code
 * @property string|null $primary_language_iso2_code
 * @property CarbonInterface|null $birth_date
 * @property CarbonInterface|null $death_date
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
        'death_date' => 'immutable_date',
    ];

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];
}
