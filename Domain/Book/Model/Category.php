<?php

namespace Domain\Book\Model;

use Carbon\CarbonInterface;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Category find(string $id, array $columns = ['*'])
 * @method static Category findOrFail(string $id, array $columns = ['*'])
 * @method static Category findOrNew(string $id, array $columns = ['*'])
 * @method static Category sole(array $columns = ['*'])
 * @method static Category first(array $columns = ['*'])
 * @method static Category firstOrFail(array $columns = ['*'])
 * @method static Category firstOrCreate(array $filter, array $values)
 * @method static Category firstOrNew(array $filter, array $values)
 * @method static Category|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Category lockForUpdate()
 * @method static Builder|Category select(array $columns = ['*'])
 * @method static Builder|Category with(array  $relations)
 * @method static Builder|Category leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Category where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Category whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Category whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Category whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Category whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Category orderBy(string $column, string $direction = 'asc')
 *
 * @property bool $is_fiction
 * @property string $id
 * @property string $category_name
 * @property string $category_description
 * @property CarbonInterface $created_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Category extends Model {
    use AuditChangeLogger;

    protected $table = 'category';
    protected $dateFormat = 'Y-m-d H:i:sO';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'immutable_datetime',
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
}
