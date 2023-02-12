<?php declare(strict_types=1);

namespace Domain\Book\Model;

use Closure;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
 * @method static BookCategory|null firstWhere(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Collection all(array $columns = ['*'])
 * @method static Collection get(array $columns = ['*'])
 * @method static Collection fromQuery(string $query, array $bindings = [])
 * @method static BookCategory lockForUpdate()
 * @method static BookCategory select(array $columns = ['*'])
 * @method static BookCategory with(array $relations)
 * @method static BookCategory leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static BookCategory where(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static BookCategory whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static BookCategory whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static BookCategory whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static BookCategory whereDoesntHave(string $relation, Closure $callback = null)
 * @method static BookCategory withWhereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static BookCategory whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static BookCategory whereNull(string|array $columns, string $boolean = 'and')
 * @method static BookCategory whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static BookCategory whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static BookCategory orderBy(string $column, string $direction = 'asc')
 * @method static BookCategory orderByDesc(string $column)
 * @method static BookCategory limit(int $value)
 * @method static int count(array $columns = ['*'])
 * @method static mixed sum(string $column)
 * @method static bool exists()
 *
 * @property bool $is_fiction
 * @property string $created_at
 * @property string $book_category_enum
 * @property string $book_category_name
 * @property string $book_category_description
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
final class BookCategory extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'book_category';
    protected $primaryKey = 'book_category_enum';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    protected $guarded = ['book_category_enum', 'updated_at', 'created_at', 'deleted_at'];
}
