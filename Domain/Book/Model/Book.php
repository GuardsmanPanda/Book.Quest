<?php declare(strict_types=1);

namespace Domain\Book\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\Series\Model\Series;
use Domain\Universe\Model\Universe;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Book|null find(string $id, array $columns = ['*'])
 * @method static Book findOrFail(string $id, array $columns = ['*'])
 * @method static Book sole(array $columns = ['*'])
 * @method static Book|null first(array $columns = ['*'])
 * @method static Book firstOrFail(array $columns = ['*'])
 * @method static Book firstOrCreate(array $filter, array $values)
 * @method static Book firstOrNew(array $filter, array $values)
 * @method static Book|null firstWhere(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Collection|Book all(array $columns = ['*'])
 * @method static Collection|Book get(array $columns = ['*'])
 * @method static Collection|Book fromQuery(string $query, array $bindings = [])
 * @method static Book lockForUpdate()
 * @method static Book select(array $columns = ['*'])
 * @method static Book with(array $relations)
 * @method static Book leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Book where(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Book whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Book whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Book whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Book whereDoesntHave(string $relation, Closure $callback = null)
 * @method static Book withWhereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static Book whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Book whereNull(string|array $columns, string $boolean = 'and')
 * @method static Book whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Book whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Book orderBy(string $column, string $direction = 'asc')
 * @method static int count(array $columns = ['*'])
 *
 * @property int|null $page_count
 * @property int|null $series_order_major
 * @property int|null $series_order_minor
 * @property string $id
 * @property string $age_group
 * @property string $book_slug
 * @property string $book_title
 * @property string $created_at
 * @property string $updated_at
 * @property string $world_type
 * @property string $book_category_enum
 * @property string $book_short_url_code
 * @property string $book_time_period_enum
 * @property string|null $isbn_10
 * @property string|null $isbn_13
 * @property string|null $series_id
 * @property string|null $universe_id
 * @property string|null $goodreads_url
 * @property string|null $google_books_id
 * @property CarbonInterface|null $publication_date
 *
 * @property Universe|null $universe
 * @property Series|null $series
 * @property BookTimePeriod $bookTimePeriodEnum
 * @property BookCategory $bookCategoryEnum
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Book extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'book';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';

    /** @var array<string, string> $casts */
    protected $casts = [
        'publication_date' => 'immutable_date',
    ];

    public function universe(): BelongsTo|null {
        return $this->belongsTo(related: Universe::class, foreignKey: 'universe_id', ownerKey: 'id');
    }

    public function series(): BelongsTo|null {
        return $this->belongsTo(related: Series::class, foreignKey: 'series_id', ownerKey: 'id');
    }

    public function bookTimePeriodEnum(): BelongsTo {
        return $this->belongsTo(related: BookTimePeriod::class, foreignKey: 'book_time_period_enum', ownerKey: 'book_time_period_enum');
    }

    public function bookCategoryEnum(): BelongsTo {
        return $this->belongsTo(related: BookCategory::class, foreignKey: 'book_category_enum', ownerKey: 'book_category_enum');
    }

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];
}
