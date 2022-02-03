<?php

namespace Domain\Universe\Model;

use Carbon\CarbonInterface;
use Domain\Universe\Model\Universe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static UniverseUri find(int $id, array $columns = ['*'])
 * @method static UniverseUri findOrFail(int $id, array $columns = ['*'])
 * @method static UniverseUri findOrNew(int $id, array $columns = ['*'])
 * @method static UniverseUri sole(array $columns = ['*'])
 * @method static UniverseUri first(array $columns = ['*'])
 * @method static UniverseUri firstOrFail(array $columns = ['*'])
 * @method static UniverseUri firstOrCreate(array $filter, array $values)
 * @method static UniverseUri firstOrNew(array $filter, array $values)
 * @method static UniverseUri|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|UniverseUri lockForUpdate()
 * @method static Builder|UniverseUri select(array $columns = ['*'])
 * @method static Builder|UniverseUri with(array|string  $relations)
 * @method static Builder|UniverseUri leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|UniverseUri where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|UniverseUri whereIn(string $column, $values, $boolean = 'and', $not = false)
 * @method static Builder|UniverseUri whereNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|UniverseUri whereNotNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|UniverseUri orderBy(string $column, string $direction = 'asc')
 *
 * @property int $id
 * @property string $uri_id
 * @property string $universe_id
 * @property string $universe_uri
 * @property string $universe_uri_description
 * @property CarbonInterface $created_at
 * @property Universe $universe
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class UniverseUri extends Model {
    use AuditChangeLogger;

    protected $table = 'universe_uri';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id','updated_at','created_at','deleted_at'];

    public function universe(): BelongsTo {
        return $this->belongsTo(Universe ::class, 'universe_id', 'id');
    }
}
