<?php

namespace Domain\Uri\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\Uri\Model\UriSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Uri find(string $id, array $columns = ['*'])
 * @method static Uri findOrFail(string $id, array $columns = ['*'])
 * @method static Uri findOrNew(string $id, array $columns = ['*'])
 * @method static Uri sole(array $columns = ['*'])
 * @method static Uri first(array $columns = ['*'])
 * @method static Uri firstOrFail(array $columns = ['*'])
 * @method static Uri firstOrCreate(array $filter, array $values)
 * @method static Uri firstOrNew(array $filter, array $values)
 * @method static Uri|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Uri lockForUpdate()
 * @method static Builder|Uri select(array $columns = ['*'])
 * @method static Builder|Uri with(array  $relations)
 * @method static Builder|Uri leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Uri where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Uri whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Uri whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Uri whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Uri whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Uri orderBy(string $column, string $direction = 'asc')
 *
 * @property string $id
 * @property string $uri_type
 * @property string $uri_title
 * @property string $uri_target
 * @property string $uri_source_id
 * @property CarbonInterface $created_at
 * @property CarbonInterface $uri_broken_at
 * @property UriSource $uri_source
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Uri extends Model {
    use AuditChangeLogger;

    protected $table = 'uri';
    protected $dateFormat = 'Y-m-d H:i:sO';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'immutable_datetime',
        'uri_broken_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id','updated_at','created_at','deleted_at'];

    public function uriSource(): BelongsTo {
        return $this->belongsTo(UriSource ::class, 'uri_source_id', 'id');
    }
}
