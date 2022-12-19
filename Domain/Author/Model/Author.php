<?php declare(strict_types=1);

namespace Domain\Author\Model;

use Carbon\CarbonInterface;
use Closure;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Author|null find(string $id, array $columns = ['*'])
 * @method static Author findOrFail(string $id, array $columns = ['*'])
 * @method static Author sole(array $columns = ['*'])
 * @method static Author|null first(array $columns = ['*'])
 * @method static Author firstOrFail(array $columns = ['*'])
 * @method static Author firstOrCreate(array $filter, array $values)
 * @method static Author firstOrNew(array $filter, array $values)
 * @method static Author|null firstWhere(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Collection all(array $columns = ['*'])
 * @method static Collection get(array $columns = ['*'])
 * @method static Collection fromQuery(string $query, array $bindings = [])
 * @method static Author lockForUpdate()
 * @method static Author select(array $columns = ['*'])
 * @method static Author with(array $relations)
 * @method static Author leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Author where(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Author whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Author whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Author whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Author whereDoesntHave(string $relation, Closure $callback = null)
 * @method static Author withWhereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Author whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Author whereNull(string|array $columns, string $boolean = 'and')
 * @method static Author whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Author whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Author orderBy(string $column, string $direction = 'asc')
 * @method static Author orderByDesc(string $column)
 * @method static Author limit(int $value)
 * @method static int count(array $columns = ['*'])
 * @method static mixed sum(string $column)
 * @method static bool exists()
 *
 * @property int $author_followers
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $author_name
 * @property string $author_slug
 * @property string $author_short_url_code
 * @property string|null $birth_country_iso2_code
 * @property string|null $primary_language_iso2_code
 * @property CarbonInterface|null $birth_date
 * @property CarbonInterface|null $death_date
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Author extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'author';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';

    /** @var array<string, string> $casts */
    protected $casts = [
        'birth_date' => 'immutable_date',
        'death_date' => 'immutable_date',
    ];

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];
}
