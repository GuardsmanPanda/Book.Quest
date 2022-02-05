<?php

namespace Domain\Universe\Model;

use Carbon\CarbonInterface;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Universe find(string $id, array $columns = ['*'])
 * @method static Universe findOrFail(string $id, array $columns = ['*'])
 * @method static Universe findOrNew(string $id, array $columns = ['*'])
 * @method static Universe sole(array $columns = ['*'])
 * @method static Universe first(array $columns = ['*'])
 * @method static Universe firstOrFail(array $columns = ['*'])
 * @method static Universe firstOrCreate(array $filter, array $values)
 * @method static Universe firstOrNew(array $filter, array $values)
 * @method static Universe|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Universe lockForUpdate()
 * @method static Builder|Universe select(array $columns = ['*'])
 * @method static Builder|Universe with(array  $relations)
 * @method static Builder|Universe leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Universe where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Universe whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Universe whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Universe whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Universe whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Universe orderBy(string $column, string $direction = 'asc')
 *
 * @property string $id
 * @property string $world_type
 * @property string $universe_name
 * @property string $universe_slug
 * @property string $universe_short_url_code
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Universe extends Model {
    use AuditChangeLogger;

    protected $table = 'universe';
    protected $dateFormat = 'Y-m-d H:i:sO';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'immutable_datetime',
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
}
