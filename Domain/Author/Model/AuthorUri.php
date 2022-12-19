<?php declare(strict_types=1);

namespace Domain\Author\Model;

use Carbon\CarbonInterface;
use Closure;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static AuthorUri|null find(string $id, array $columns = ['*'])
 * @method static AuthorUri findOrFail(string $id, array $columns = ['*'])
 * @method static AuthorUri sole(array $columns = ['*'])
 * @method static AuthorUri|null first(array $columns = ['*'])
 * @method static AuthorUri firstOrFail(array $columns = ['*'])
 * @method static AuthorUri firstOrCreate(array $filter, array $values)
 * @method static AuthorUri firstOrNew(array $filter, array $values)
 * @method static AuthorUri|null firstWhere(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static Collection all(array $columns = ['*'])
 * @method static Collection get(array $columns = ['*'])
 * @method static Collection fromQuery(string $query, array $bindings = [])
 * @method static AuthorUri lockForUpdate()
 * @method static AuthorUri select(array $columns = ['*'])
 * @method static AuthorUri with(array $relations)
 * @method static AuthorUri leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static AuthorUri where(string $column, string $operator = null, string|float|int|bool $value = null, string $boolean = 'and')
 * @method static AuthorUri whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static AuthorUri whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static AuthorUri whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static AuthorUri whereDoesntHave(string $relation, Closure $callback = null)
 * @method static AuthorUri withWhereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static AuthorUri whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static AuthorUri whereNull(string|array $columns, string $boolean = 'and')
 * @method static AuthorUri whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static AuthorUri whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static AuthorUri orderBy(string $column, string $direction = 'asc')
 * @method static AuthorUri orderByDesc(string $column)
 * @method static AuthorUri limit(int $value)
 * @method static int count(array $columns = ['*'])
 * @method static mixed sum(string $column)
 * @method static bool exists()
 *
 * @property string $id
 * @property string $uri_type
 * @property string $author_id
 * @property string $author_uri
 * @property string|null $created_at
 * @property string|null $author_uri_title
 * @property CarbonInterface|null $author_uri_error_at
 *
 * @property Author $author
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class AuthorUri extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'author_uri';
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    /** @var array<string, string> $casts */
    protected $casts = [
        'author_uri_error_at' => 'immutable_datetime',
    ];

    public function author(): BelongsTo {
        return $this->belongsTo(related: Author::class, foreignKey: 'author_id', ownerKey: 'id');
    }

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at'];
}
