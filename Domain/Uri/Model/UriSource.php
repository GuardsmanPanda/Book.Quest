<?php declare(strict_types=1);

namespace Domain\Uri\Model;

use Carbon\CarbonInterface;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static UriSource find(string $id, array $columns = ['*'])
 * @method static UriSource findOrFail(string $id, array $columns = ['*'])
 * @method static UriSource findOrNew(string $id, array $columns = ['*'])
 * @method static UriSource sole(array $columns = ['*'])
 * @method static UriSource first(array $columns = ['*'])
 * @method static UriSource firstOrFail(array $columns = ['*'])
 * @method static UriSource firstOrCreate(array $filter, array $values)
 * @method static UriSource firstOrNew(array $filter, array $values)
 * @method static UriSource|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|UriSource lockForUpdate()
 * @method static Builder|UriSource select(array $columns = ['*'])
 * @method static Builder|UriSource with(array  $relations)
 * @method static Builder|UriSource leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|UriSource where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|UriSource whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|UriSource whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|UriSource whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|UriSource whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|UriSource orderBy(string $column, string $direction = 'asc')
 *
 * @property string $id
 * @property string $uri_title
 * @property CarbonInterface $created_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class UriSource extends Model {
    use AuditChangeLogger;

    protected $table = 'uri_source';
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

    protected $guarded = ['id','updated_at','created_at','deleted_at'];
}
