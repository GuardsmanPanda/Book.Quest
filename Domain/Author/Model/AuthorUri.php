<?php

namespace Domain\Author\Model;

use Carbon\CarbonInterface;
use Closure;
use Domain\App\Model\Uri;
use Domain\Author\Model\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static AuthorUri find(int $id, array $columns = ['*'])
 * @method static AuthorUri findOrFail(int $id, array $columns = ['*'])
 * @method static AuthorUri findOrNew(int $id, array $columns = ['*'])
 * @method static AuthorUri sole(array $columns = ['*'])
 * @method static AuthorUri first(array $columns = ['*'])
 * @method static AuthorUri firstOrFail(array $columns = ['*'])
 * @method static AuthorUri firstOrCreate(array $filter, array $values)
 * @method static AuthorUri firstOrNew(array $filter, array $values)
 * @method static AuthorUri|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|AuthorUri lockForUpdate()
 * @method static Builder|AuthorUri select(array $columns = ['*'])
 * @method static Builder|AuthorUri with(array  $relations)
 * @method static Builder|AuthorUri leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|AuthorUri where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|AuthorUri whereIn(string $column, array $values, string $boolean = 'and', bool $not = false)
 * @method static Builder|AuthorUri whereHas(string $relation, Closure $callback, string $operator = '>=', int $count = 1)
 * @method static Builder|AuthorUri whereNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|AuthorUri whereNotNull(string|array $columns, string $boolean = 'and')
 * @method static Builder|AuthorUri orderBy(string $column, string $direction = 'asc')
 *
 * @property int $id
 * @property string $uri_id
 * @property string $author_id
 * @property string $author_uri
 * @property string $author_uri_description
 * @property CarbonInterface $created_at
 * @property Uri $uri
 * @property Author $author
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class AuthorUri extends Model {
    use AuditChangeLogger;

    protected $table = 'author_uri';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id','updated_at','created_at','deleted_at'];

    public function author(): BelongsTo {
        return $this->belongsTo(Author ::class, 'author_id', 'id');
    }
    public function uri(): BelongsTo {
        return $this->belongsTo(Uri ::class, 'uri_id', 'id');
    }
}
