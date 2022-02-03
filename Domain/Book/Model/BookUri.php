<?php

namespace Domain\Book\Model;

use Carbon\CarbonInterface;
use Domain\Book\Model\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Infrastructure\Audit\Traits\AuditChangeLogger;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static BookUri find(int $id, array $columns = ['*'])
 * @method static BookUri findOrFail(int $id, array $columns = ['*'])
 * @method static BookUri findOrNew(int $id, array $columns = ['*'])
 * @method static BookUri sole(array $columns = ['*'])
 * @method static BookUri first(array $columns = ['*'])
 * @method static BookUri firstOrFail(array $columns = ['*'])
 * @method static BookUri firstOrCreate(array $filter, array $values)
 * @method static BookUri firstOrNew(array $filter, array $values)
 * @method static BookUri|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|BookUri lockForUpdate()
 * @method static Builder|BookUri select(array $columns = ['*'])
 * @method static Builder|BookUri with(array|string  $relations)
 * @method static Builder|BookUri leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|BookUri where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|BookUri whereIn(string $column, $values, $boolean = 'and', $not = false)
 * @method static Builder|BookUri whereNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|BookUri whereNotNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|BookUri orderBy(string $column, string $direction = 'asc')
 *
 * @property int $id
 * @property string $uri_id
 * @property string $book_id
 * @property string $book_uri
 * @property string $book_uri_description
 * @property CarbonInterface $created_at
 * @property Book $book
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class BookUri extends Model {
    use AuditChangeLogger;

    protected $table = 'book_uri';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'immutable_datetime',
    ];

    protected $guarded = ['id','updated_at','created_at','deleted_at'];

    public function book(): BelongsTo {
        return $this->belongsTo(Book ::class, 'book_id', 'id');
    }
}
