<?php

namespace Domain\Series\Model;

use Carbon\CarbonInterface;
use Domain\Book\Model\TimePeriod;
use Domain\Universe\Model\Universe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Series find(string $id, array $columns = ['*'])
 * @method static Series findOrFail(string $id, array $columns = ['*'])
 * @method static Series findOrNew(string $id, array $columns = ['*'])
 * @method static Series sole(array $columns = ['*'])
 * @method static Series first(array $columns = ['*'])
 * @method static Series firstOrFail(array $columns = ['*'])
 * @method static Series firstOrCreate(array $filter, array $values)
 * @method static Series firstOrNew(array $filter, array $values)
 * @method static Series|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Series lockForUpdate()
 * @method static Builder|Series select(array $columns = ['*'])
 * @method static Builder|Series with(array|string  $relations)
 * @method static Builder|Series leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Series where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Series whereIn(string $column, $values, $boolean = 'and', $not = false)
 * @method static Builder|Series whereNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|Series whereNotNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|Series orderBy(string $column, string $direction = 'asc')
 *
 * @property string $id
 * @property string $world_type
 * @property string $series_name
 * @property string $universe_id
 * @property string $time_period_id
 * @property string $series_short_url_code
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @property Universe $universe
 * @property TimePeriod $time_period
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Series extends Model {
    use AuditChangeLogger;

    protected $table = 'series';
    protected $dateFormat = 'Y-m-d H:i:sO';
    protected $keyType = 'string';
    public $incrementing = false;

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

    public function timePeriod(): BelongsTo {
        return $this->belongsTo(TimePeriod ::class, 'time_period_id', 'id');
    }
    public function universe(): BelongsTo {
        return $this->belongsTo(Universe ::class, 'universe_id', 'id');
    }
}
