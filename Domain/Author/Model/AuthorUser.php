<?php

namespace Domain\Author\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\User\Model\User;
use GuardsmanPanda\Larabear\Enum\BearSeverityEnum;
use GuardsmanPanda\Larabear\Infrastructure\Database\Traits\BearLogDatabaseChanges;
use GuardsmanPanda\Larabear\Infrastructure\Error\Crud\BearLogErrorCreator;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use RuntimeException;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static AuthorUser sole(array $columns = ['*'])
 * @method static AuthorUser|null first(array $columns = ['*'])
 * @method static AuthorUser firstOrFail(array $columns = ['*'])
 * @method static AuthorUser firstOrCreate(array $filter, array $values)
 * @method static AuthorUser firstOrNew(array $filter, array $values)
 * @method static AuthorUser|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Collection|AuthorUser all(array $columns = ['*'])
 * @method static Collection|AuthorUser fromQuery(string $query, array $bindings = [])
 * @method static Builder|AuthorUser lockForUpdate()
 * @method static Builder|AuthorUser select(array $columns = ['*'])
 * @method static Builder|AuthorUser with(array  $relations)
 * @method static Builder|AuthorUser leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|AuthorUser where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|AuthorUser whereExists(Closure $callback, string $boolean = 'and', bool $not = false)
 * @method static Builder|AuthorUser whereNotExists(Closure $callback, string $boolean = 'and')
 * @method static Builder|AuthorUser whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|AuthorUser whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|AuthorUser whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|AuthorUser whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|AuthorUser whereRaw(string $sql, array $bindings = [], string $boolean = 'and')
 * @method static Builder|AuthorUser orderBy(string $column, string $direction = 'asc')
 *
 * @property string $status
 * @property string $user_id
 * @property string $author_id
 * @property CarbonInterface $updated_at
 * @property CarbonInterface|null $created_at
 *
 * @property User $user
 * @property Author $author
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class AuthorUser extends Model {
    use BearLogDatabaseChanges;

    protected $connection = 'pgsql';
    protected $table = 'author_user';
    /** @var array<string> primaryKeyArray */
    private array $primaryKeyArray = ['author_id', 'user_id'];
    protected $keyType = 'array';
    public $incrementing = false;
    protected $dateFormat = 'Y-m-d H:i:sO';

    /** @var array<string, string> $casts */
    protected $casts = [
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
    ];


    public function user(): BelongsTo {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id', ownerKey: 'id');
    }
    public function author(): BelongsTo {
        return $this->belongsTo(related: Author::class, foreignKey: 'author_id', ownerKey: 'id');
    }

    protected $guarded = ['author_id', 'user_id', 'updated_at', 'created_at', 'deleted_at'];

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


    /** @return Mixed[] */
    public function getKey(): array {
        $attributes = [];
        foreach ($this->primaryKeyArray as $key) {
            $attributes[$key] = $this->getAttribute($key);
        }
        return $attributes;
    }

    /**
     * @param array<string, string> $ids # Ids in the form ['key1' => 'value1', 'key2' => 'value2']
     * @param array<string> $columns
     * @return AuthorUser|null
     */
    public static function find(array $ids, array $columns = ['*']): AuthorUser|null {
        $me = new self;
        $query = $me->newQuery();
        foreach ($me->primaryKeyArray as $key) {
            $query->where(column: $key, operator: '=', value: $ids[$key]);
        }
        $result = $query->first($columns);
        return $result instanceof self ? $result : null;
    }

    /**
     * @param array<string, string> $ids # Ids in the form ['key1' => 'value1', 'key2' => 'value2']
     * @param array<string> $columns
     * @return AuthorUser
     */
    public static function findOrFail(array $ids, array $columns = ['*']): AuthorUser {
        $result = self::find(ids: $ids, columns: $columns);
        return $result ?? throw (new ModelNotFoundException())->setModel(model: __CLASS__, ids: array_values($ids));
    }

    protected function setKeysForSaveQuery($query): EloquentBuilder { 
        foreach ($this->primaryKeyArray as $key) {
            if (isset($this->$key)) {
                $query->where(column: $key, operator: '=', value: $this->$key);
            } else {
                throw new RuntimeException(message: "Missing primary key value for $key");
            }
        }
        return $query;
    }
    protected function setKeysForSelectQuery($query): EloquentBuilder { 
        foreach ($this->primaryKeyArray as $key) {
            if (isset($this->$key)) {
                $query->where(column: $key, operator: '=', value: $this->$key);
            } else {
                throw new RuntimeException(message: "Missing primary key value for $key");
            }
        }
        return $query;
    }
}
