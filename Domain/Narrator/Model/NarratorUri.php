<?php

namespace Domain\Narrator\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\App\Model\Uri;
use Domain\Narrator\Model\Narrator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static NarratorUri find(int $id, array $columns = ['*'])
 * @method static NarratorUri findOrFail(int $id, array $columns = ['*'])
 * @method static NarratorUri findOrNew(int $id, array $columns = ['*'])
 * @method static NarratorUri sole(array $columns = ['*'])
 * @method static NarratorUri first(array $columns = ['*'])
 * @method static NarratorUri firstOrFail(array $columns = ['*'])
 * @method static NarratorUri firstOrCreate(array $filter, array $values)
 * @method static NarratorUri firstOrNew(array $filter, array $values)
 * @method static NarratorUri|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|NarratorUri lockForUpdate()
 * @method static Builder|NarratorUri select(array $columns = ['*'])
 * @method static Builder|NarratorUri with(array  $relations)
 * @method static Builder|NarratorUri leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|NarratorUri where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|NarratorUri whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|NarratorUri whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|NarratorUri whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|NarratorUri whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|NarratorUri orderBy(string $column, string $direction = 'asc')
 *
 * @property int $id
 * @property string $uri_id
 * @property string $narrator_id
 * @property string $narrator_uri
 * @property string $narrator_uri_description
 * @property CarbonInterface $created_at
 * @property Uri $uri
 * @property Narrator $narrator
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class NarratorUri extends Model {
    use AuditChangeLogger;

    protected $table = 'narrator_uri';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id','updated_at','created_at','deleted_at'];

    public function narrator(): BelongsTo {
        return $this->belongsTo(Narrator ::class, 'narrator_id', 'id');
    }
    public function uri(): BelongsTo {
        return $this->belongsTo(Uri ::class, 'uri_id', 'id');
    }
}
