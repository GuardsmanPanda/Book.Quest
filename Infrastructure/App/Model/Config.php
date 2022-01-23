<?php

namespace Infrastructure\App\Model;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Config find(string $id, array $columns = ['*'])
 * @method static Config findOrFail(string $id, array $columns = ['*'])
 * @method static Config findOrNew(string $id, array $columns = ['*'])
 * @method static Config sole(array $columns = ['*'])
 * @method static Config first(array $columns = ['*'])
 * @method static Config firstOrFail(array $columns = ['*'])
 * @method static Config firstOrCreate(array $filter, array $values)
 * @method static Config firstOrNew(array $filter, array $values)
 * @method static Config|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Config lockForUpdate()
 * @method static Builder|Config select(array $columns = ['*'])
 * @method static Builder|Config with(array|string  $relations)
 * @method static Builder|Config leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Config where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Config whereIn(string $column, $values, $boolean = 'and', $not = false)
 * @method static Builder|Config whereNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|Config whereNotNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|Config orderBy(string $column, string $direction = 'asc')
 *
 * @property string $config_key
 * @property string $config_value
 * @property CarbonInterface $created_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Config extends Model {
    use AuditChangeLogger;

    protected $table = 'z_config';
    protected $dateFormat = 'Y-m-d H:i:sO';
    protected $keyType = 'string';
    protected $primaryKey = 'config_key';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id','updated_at','created_at','deleted_at'];
}
