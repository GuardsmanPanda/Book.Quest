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
 * @method static BookCategory|null find(string $id, array $columns = ['*'])
 * @method static BookCategory findOrFail(string $id, array $columns = ['*'])
 * @method static BookCategory sole(array $columns = ['*'])
 * @method static BookCategory|null first(array $columns = ['*'])
 * @method static BookCategory firstOrFail(array $columns = ['*'])
 * @method static BookCategory firstOrCreate(array $filter, array $values)
 * @method static BookCategory firstOrNew(array $filter, array $values)
 * @method static BookCategory|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Collection|BookCategory all(array $columns = ['*'])
 * @method static Collection|BookCategory fromQuery(string $query, array $bindings = [])
 * @method static Builder|BookCategory lockForUpdate()
 * @method static Builder|BookCategory select(array $columns = ['*'])
 * @method static Builder|BookCategory with(array  $relations)
 * @method static Builder|BookCategory leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|BookCategory where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|BookCategory whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Builder|BookCategory whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Builder|BookCategory whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|BookCategory whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|BookCategory whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|BookCategory whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|BookCategory whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Builder|BookCategory orderBy(string $column, string $direction = 'asc')
 * @method static int count(array $columns = ['*'])
 *
 * @property bool $is_fiction
 * @property string $book_category_enum
 * @property string $book_category_name
 * @property string $book_category_description
 * @property CarbonInterface $created_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class BookCategory extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'book_category';
    protected $primaryKey = 'book_category_enum';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    /** @var array<string, string> $casts */
    protected $casts = [
        'created_at' => 'immutable_datetime',
    ];

    protected $guarded = ['book_category_enum', 'updated_at', 'created_at', 'deleted_at'];
}
