<?php

namespace Domain\Book\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\Book\Model\Category;
use Domain\Book\Model\TimePeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Book find(string $id, array $columns = ['*'])
 * @method static Book findOrFail(string $id, array $columns = ['*'])
 * @method static Book findOrNew(string $id, array $columns = ['*'])
 * @method static Book sole(array $columns = ['*'])
 * @method static Book first(array $columns = ['*'])
 * @method static Book firstOrFail(array $columns = ['*'])
 * @method static Book firstOrCreate(array $filter, array $values)
 * @method static Book firstOrNew(array $filter, array $values)
 * @method static Book|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Book lockForUpdate()
 * @method static Builder|Book select(array $columns = ['*'])
 * @method static Builder|Book with(array  $relations)
 * @method static Builder|Book leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Book where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Book whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Book whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Book whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Book whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Book orderBy(string $column, string $direction = 'asc')
 *
 * @property int $page_count
 * @property int $series_order_major
 * @property int $series_order_minor
 * @property string $id
 * @property string $isbn_10
 * @property string $isbn_13
 * @property string $age_group
 * @property string $book_slug
 * @property string $series_id
 * @property string $book_title
 * @property string $world_type
 * @property string $audible_url
 * @property string $category_id
 * @property string $universe_id
 * @property string $goodreads_url
 * @property string $wikipedia_url
 * @property string $amazon_com_url
 * @property string $time_period_id
 * @property string $google_books_id
 * @property string $book_short_url_code
 * @property CarbonInterface $publication_date
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @property Category $category
 * @property TimePeriod $time_period
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Book extends Model {
    use AuditChangeLogger;

    protected $table = 'book';
    protected $dateFormat = 'Y-m-d H:i:sO';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'immutable_datetime',
        'publication_date' => 'immutable_date',
        'updated_at' => 'immutable_datetime',
    ];

    public static function boot(): void {
        parent::boot();
        static::creating(static function (self $model) {
            if ($model->id === null) {
                $model->id = Str::uuid()->toString();
            }
        });
    }

    protected $guarded = ['id','updated_at','created_at','deleted_at'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category ::class, 'category_id', 'id');
    }
    public function timePeriod(): BelongsTo {
        return $this->belongsTo(TimePeriod ::class, 'time_period_id', 'id');
    }
}
