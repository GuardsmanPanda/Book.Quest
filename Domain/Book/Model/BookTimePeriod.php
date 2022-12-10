<?php declare(strict_types=1);

namespace Domain\Book\Model;

use Closure;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static BookTimePeriod|null find(string $id, array $columns = ['*'])
 * @method static BookTimePeriod findOrFail(string $id, array $columns = ['*'])
 * @method static BookTimePeriod sole(array $columns = ['*'])
 * @method static BookTimePeriod|null first(array $columns = ['*'])
 * @method static BookTimePeriod firstOrFail(array $columns = ['*'])
 * @method static BookTimePeriod firstOrCreate(array $filter, array $values)
 * @method static BookTimePeriod firstOrNew(array $filter, array $values)
 * @method static BookTimePeriod|null firstWhere(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Collection|BookTimePeriod all(array $columns = ['*'])
 * @method static Collection|BookTimePeriod get(array $columns = ['*'])
 * @method static Collection|BookTimePeriod fromQuery(string $query, array $bindings = [])
 * @method static BookTimePeriod lockForUpdate()
 * @method static BookTimePeriod select(array $columns = ['*'])
 * @method static BookTimePeriod with(array $relations)
 * @method static BookTimePeriod leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static BookTimePeriod where(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static BookTimePeriod whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static BookTimePeriod whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static BookTimePeriod whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static BookTimePeriod whereDoesntHave(string $relation, Closure $callback = null)
 * @method static BookTimePeriod withWhereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static BookTimePeriod whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static BookTimePeriod whereNull(string|array $columns, string $boolean = 'and')
 * @method static BookTimePeriod whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static BookTimePeriod whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static BookTimePeriod orderBy(string $column, string $direction = 'asc')
 * @method static int count(array $columns = ['*'])
 *
 * @property int $approximately_to_year
 * @property int $approximately_from_year
 * @property string $created_at
 * @property string $book_time_period_enum
 * @property string $book_time_period_name
 * @property string $time_period_description
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class BookTimePeriod extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'book_time_period';
    protected $primaryKey = 'book_time_period_enum';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    protected $guarded = ['book_time_period_enum', 'updated_at', 'created_at', 'deleted_at'];
}
