<?php

namespace Domain\App\Model;

use Carbon\CarbonInterface;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Language find(string $id, array $columns = ['*'])
 * @method static Language findOrFail(string $id, array $columns = ['*'])
 * @method static Language findOrNew(string $id, array $columns = ['*'])
 * @method static Language sole(array $columns = ['*'])
 * @method static Language first(array $columns = ['*'])
 * @method static Language firstOrFail(array $columns = ['*'])
 * @method static Language firstOrCreate(array $filter, array $values)
 * @method static Language firstOrNew(array $filter, array $values)
 * @method static Language|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Language lockForUpdate()
 * @method static Builder|Language select(array $columns = ['*'])
 * @method static Builder|Language with(array  $relations)
 * @method static Builder|Language leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Language where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Language whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Language whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Language whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Language whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Language orderBy(string $column, string $direction = 'asc')
 *
 * @property string $id
 * @property string $language_name
 * @property string $two_letter_code
 * @property string $three_letter_code
 * @property CarbonInterface $created_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Language extends Model {
    protected $table = 'language';
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
