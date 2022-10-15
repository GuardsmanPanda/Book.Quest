<?php

namespace Domain\Book\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\Series\Model\Series;
use Domain\Universe\Model\Universe;
use GuardsmanPanda\Larabear\Enum\BearSeverityEnum;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use GuardsmanPanda\Larabear\Infrastructure\Error\Crud\BearLogErrorCreator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use RuntimeException;

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
 * @method static Book|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Collection|Book all(array $columns = ['*'])
 * @method static Collection|Book fromQuery(string $query, array $bindings = [])
 * @method static Builder|Book lockForUpdate()
 * @method static Builder|Book select(array $columns = ['*'])
 * @method static Builder|Book with(array  $relations)
 * @method static Builder|Book leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Book where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Book whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Builder|Book whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Builder|Book whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Book whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Book whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Book whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Book whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Builder|Book orderBy(string $column, string $direction = 'asc')
 *
 * @property int|null $page_count
 * @property int|null $series_order_major
 * @property int|null $series_order_minor
 * @property string $id
 * @property string $age_group
 * @property string $book_slug
 * @property string $book_title
 * @property string $world_type
 * @property string $book_category_enum
 * @property string $book_short_url_code
 * @property string $book_time_period_enum
 * @property string|null $isbn_10
 * @property string|null $isbn_13
 * @property string|null $series_id
 * @property string|null $universe_id
 * @property string|null $goodreads_url
 * @property string|null $amazon_com_url
 * @property string|null $google_books_id
 * @property CarbonInterface|null $publication_date
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
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
        'created_at' => 'immutable_datetime',
        'publication_date' => 'immutable_date',
        'updated_at' => 'immutable_datetime',
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
