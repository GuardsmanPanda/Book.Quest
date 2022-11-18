<?php

namespace Domain\Series\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\Universe\Model\Universe;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Series|null find(string $id, array $columns = ['*'])
 * @method static Series findOrFail(string $id, array $columns = ['*'])
 * @method static Series sole(array $columns = ['*'])
 * @method static Series|null first(array $columns = ['*'])
 * @method static Series firstOrFail(array $columns = ['*'])
 * @method static Series firstOrCreate(array $filter, array $values)
 * @method static Series firstOrNew(array $filter, array $values)
 * @method static Series|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Collection|Series all(array $columns = ['*'])
 * @method static Collection|Series fromQuery(string $query, array $bindings = [])
 * @method static Builder|Series lockForUpdate()
 * @method static Builder|Series select(array $columns = ['*'])
 * @method static Builder|Series with(array  $relations)
 * @method static Builder|Series leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Series where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Series whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Builder|Series whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Builder|Series whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Series whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Series whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Series whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Series whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Builder|Series orderBy(string $column, string $direction = 'asc')
 * @method static int count(array $columns = ['*'])
 *
 * @property string $id
 * @property string $world_type
 * @property string $series_name
 * @property string $series_slug
 * @property string $series_short_url_code
 * @property string|null $universe_id
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 *
 * @property Universe|null $universe
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Series extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'series';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';

    /** @var array<string, string> $casts */
    protected $casts = [
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
    ];


    public function universe(): BelongsTo|null {
        return $this->belongsTo(related: Universe::class, foreignKey: 'universe_id', ownerKey: 'id');
    }

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];
}
