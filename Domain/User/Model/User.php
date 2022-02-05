<?php

namespace Domain\User\Model;

use Carbon\CarbonInterface;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static User find(string $id, array $columns = ['*'])
 * @method static User findOrFail(string $id, array $columns = ['*'])
 * @method static User findOrNew(string $id, array $columns = ['*'])
 * @method static User sole(array $columns = ['*'])
 * @method static User first(array $columns = ['*'])
 * @method static User firstOrFail(array $columns = ['*'])
 * @method static User firstOrCreate(array $filter, array $values)
 * @method static User firstOrNew(array $filter, array $values)
 * @method static User|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|User lockForUpdate()
 * @method static Builder|User select(array $columns = ['*'])
 * @method static Builder|User with(array  $relations)
 * @method static Builder|User leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|User where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|User whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|User whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|User whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|User whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|User orderBy(string $column, string $direction = 'asc')
 *
 * @property int $twitch_id
 * @property string $id
 * @property string $email
 * @property string $display_name
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class User extends Model {
    use AuditChangeLogger;

    protected $table = 'users';
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
