<?php

namespace Domain\Narrator\Model;

use Carbon\CarbonInterface;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Infrastructure\App\Model\Country;
use Infrastructure\App\Model\Language;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Narrator find(string $id, array $columns = ['*'])
 * @method static Narrator findOrFail(string $id, array $columns = ['*'])
 * @method static Narrator findOrNew(string $id, array $columns = ['*'])
 * @method static Narrator sole(array $columns = ['*'])
 * @method static Narrator first(array $columns = ['*'])
 * @method static Narrator firstOrFail(array $columns = ['*'])
 * @method static Narrator firstOrCreate(array $filter, array $values)
 * @method static Narrator firstOrNew(array $filter, array $values)
 * @method static Narrator|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Narrator lockForUpdate()
 * @method static Builder|Narrator select(array $columns = ['*'])
 * @method static Builder|Narrator with(array  $relations)
 * @method static Builder|Narrator leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Narrator where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Narrator whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Narrator whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Narrator whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Narrator whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Narrator orderBy(string $column, string $direction = 'asc')
 *
 * @property int $birth_year
 * @property string $id
 * @property string $narrator_name
 * @property string $narrator_slug
 * @property string $birth_country_id
 * @property string $primary_language_id
 * @property string $narrator_short_url_code
 * @property CarbonInterface $birth_date
 * @property CarbonInterface $death_date
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @property Country $birth_country
 * @property Language $primary_language
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Narrator extends Model {
    use AuditChangeLogger;

    protected $table = 'narrator';
    protected $dateFormat = 'Y-m-d H:i:sO';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'immutable_date',
        'created_at' => 'immutable_datetime',
        'death_date' => 'immutable_date',
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

    public function birthCountry(): BelongsTo {
        return $this->belongsTo(Country ::class, 'birth_country_id', 'id');
    }
    public function primaryLanguage(): BelongsTo {
        return $this->belongsTo(Language ::class, 'primary_language_id', 'id');
    }
}
