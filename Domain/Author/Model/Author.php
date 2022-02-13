<?php

namespace Domain\Author\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\App\Model\Country;
use Domain\App\Model\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Author find(string $id, array $columns = ['*'])
 * @method static Author findOrFail(string $id, array $columns = ['*'])
 * @method static Author findOrNew(string $id, array $columns = ['*'])
 * @method static Author sole(array $columns = ['*'])
 * @method static Author first(array $columns = ['*'])
 * @method static Author firstOrFail(array $columns = ['*'])
 * @method static Author firstOrCreate(array $filter, array $values)
 * @method static Author firstOrNew(array $filter, array $values)
 * @method static Author|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Author lockForUpdate()
 * @method static Builder|Author select(array $columns = ['*'])
 * @method static Builder|Author with(array  $relations)
 * @method static Builder|Author leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Author where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Author whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Author whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Author whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Author whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Author orderBy(string $column, string $direction = 'asc')
 *
 * @property int $birth_year
 * @property string $id
 * @property string $author_name
 * @property string $author_slug
 * @property string $biography_html
 * @property string $birth_country_id
 * @property string $biography_markdown
 * @property string $primary_language_id
 * @property string $author_short_url_code
 * @property CarbonInterface $birth_date
 * @property CarbonInterface $death_date
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @property Country $birth_country
 * @property Language $primary_language
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Author extends Model {
    use AuditChangeLogger;

    protected $table = 'author';
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
