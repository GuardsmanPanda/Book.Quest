<?php

namespace Domain\Author\Model;

use Carbon\CarbonInterface;
use Closure;
use GuardsmanPanda\Larabear\Enum\BearSeverityEnum;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use GuardsmanPanda\Larabear\Infrastructure\Error\Crud\BearLogErrorCreator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use RuntimeException;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static Author|null find(string $id, array $columns = ['*'])
 * @method static Author findOrFail(string $id, array $columns = ['*'])
 * @method static Author sole(array $columns = ['*'])
 * @method static Author|null first(array $columns = ['*'])
 * @method static Author firstOrFail(array $columns = ['*'])
 * @method static Author firstOrCreate(array $filter, array $values)
 * @method static Author firstOrNew(array $filter, array $values)
 * @method static Author|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Collection|Author all(array $columns = ['*'])
 * @method static Collection|Author fromQuery(string $query, array $bindings = [])
 * @method static Builder|Author lockForUpdate()
 * @method static Builder|Author select(array $columns = ['*'])
 * @method static Builder|Author with(array  $relations)
 * @method static Builder|Author leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|Author where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|Author whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Builder|Author whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Builder|Author whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|Author whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|Author whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Author whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|Author whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Builder|Author orderBy(string $column, string $direction = 'asc')
 *
 * @property int $author_followers
 * @property int|null $birth_year
 * @property int|null $death_year
 * @property string $id
 * @property string $author_name
 * @property string $author_slug
 * @property string $author_short_url_code
 * @property string|null $biography_html
 * @property string|null $biography_markdown
 * @property string|null $birth_country_iso2_code
 * @property string|null $primary_language_iso2_code
 * @property CarbonInterface|null $birth_date
 * @property CarbonInterface|null $death_date
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class Author extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'author';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';

    /** @var array<string, string> $casts */
    protected $casts = [
        'birth_date' => 'immutable_date',
        'created_at' => 'immutable_datetime',
        'death_date' => 'immutable_date',
        'updated_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];

    public function getAttribute($key) {
        $resp =  parent::getAttribute($key);
        if ($resp !== null || array_key_exists(key: $key, array: $this->attributes) || array_key_exists(key: $key, array: $this->relations)) {
            return $resp;
        }
        BearLogErrorCreator::create(
            message: "Attribute $key not loaded on " . static::class,
            namespace: "larabear",
            key: "attribute_not_loaded",
            severity: BearSeverityEnum::CRITICAL,
            remedy: "Make sure to include used attributes in the SELECT statement",
        );
        throw new RuntimeException(message: "Attribute $key not loaded on " . static::class);
    }
}
