<?php

namespace Domain\Book\Model;

use Carbon\CarbonInterface;
use Closure;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

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
 * @method static BookTimePeriod|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Collection|BookTimePeriod all(array $columns = ['*'])
 * @method static Collection|BookTimePeriod fromQuery(string $query, array $bindings = [])
 * @method static Builder|BookTimePeriod lockForUpdate()
 * @method static Builder|BookTimePeriod select(array $columns = ['*'])
 * @method static Builder|BookTimePeriod with(array  $relations)
 * @method static Builder|BookTimePeriod leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|BookTimePeriod where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|BookTimePeriod whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Builder|BookTimePeriod whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Builder|BookTimePeriod whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|BookTimePeriod whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|BookTimePeriod whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|BookTimePeriod whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|BookTimePeriod whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Builder|BookTimePeriod orderBy(string $column, string $direction = 'asc')
 * @method static int count(array $columns = ['*'])
 *
 * @property int $approximately_to_year
 * @property int $approximately_from_year
 * @property string $book_time_period_enum
 * @property string $book_time_period_name
 * @property string $time_period_description
 * @property CarbonInterface $created_at
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

    /** @var array<string, string> $casts */
    protected $casts = [
        'created_at' => 'immutable_datetime',
    ];

    protected $guarded = ['book_time_period_enum', 'updated_at', 'created_at', 'deleted_at'];
}
