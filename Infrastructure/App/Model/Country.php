<?php

namespace Infrastructure\App\Model;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Country find(string $id, array $columns = ['*'])
 * @method static Country findOrFail(string $id, array $columns = ['*'])
 * @method static Country findOrNew(string $id, array $columns = ['*'])
 * @method static Country sole(array $columns = ['*'])
 * @method static Country first(array $columns = ['*'])
 * @method static Country firstOrFail(array $columns = ['*'])
 * @method static Country firstOrCreate(array $filter, array $values)
 * @method static Country firstOrNew(array $filter, array $values)
 * @method static Country|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Country lockForUpdate()
 * @method static Builder|Country select(array $columns = ['*'])
 * @method static Builder|Country with(array|string  $relations)
 * @method static Builder|Country leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Country where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Country whereIn(string $column, $values, $boolean = 'and', $not = false)
 * @method static Builder|Country whereNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|Country whereNotNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|Country orderBy(string $column, string $direction = 'asc')
 *
 * @property bool $country_exists
 * @property string $id
 * @property string $iso_3
 * @property string $country_code
 * @property string $country_name
 * @property CarbonInterface $created_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Country extends Model {
    protected $table = 'country';
    protected $dateFormat = 'Y-m-d H:i:sO';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

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
