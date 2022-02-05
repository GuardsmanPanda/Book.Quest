<?php

namespace Domain\Series\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\App\Model\Uri;
use Domain\Series\Model\Series;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static SeriesUri find(int $id, array $columns = ['*'])
 * @method static SeriesUri findOrFail(int $id, array $columns = ['*'])
 * @method static SeriesUri findOrNew(int $id, array $columns = ['*'])
 * @method static SeriesUri sole(array $columns = ['*'])
 * @method static SeriesUri first(array $columns = ['*'])
 * @method static SeriesUri firstOrFail(array $columns = ['*'])
 * @method static SeriesUri firstOrCreate(array $filter, array $values)
 * @method static SeriesUri firstOrNew(array $filter, array $values)
 * @method static SeriesUri|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|SeriesUri lockForUpdate()
 * @method static Builder|SeriesUri select(array $columns = ['*'])
 * @method static Builder|SeriesUri with(array  $relations)
 * @method static Builder|SeriesUri leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|SeriesUri where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|SeriesUri whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|SeriesUri whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|SeriesUri whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|SeriesUri whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|SeriesUri orderBy(string $column, string $direction = 'asc')
 *
 * @property int $id
 * @property string $uri_id
 * @property string $series_id
 * @property string $series_uri
 * @property string $series_uri_description
 * @property CarbonInterface $created_at
 * @property Uri $uri
 * @property Series $series
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class SeriesUri extends Model {
    use AuditChangeLogger;

    protected $table = 'series_uri';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id','updated_at','created_at','deleted_at'];

    public function series(): BelongsTo {
        return $this->belongsTo(Series ::class, 'series_id', 'id');
    }
    public function uri(): BelongsTo {
        return $this->belongsTo(Uri ::class, 'uri_id', 'id');
    }
}
