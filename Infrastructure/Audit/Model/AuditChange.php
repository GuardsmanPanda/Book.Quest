<?php

namespace Infrastructure\Audit\Model;

use Carbon\CarbonInterface;
use Domain\User\Model\User;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

/**
 * AUTO GENERATED FILE DO NOT MODIFY
 *
 * @method static AuditChange find(int $id, array $columns = ['*'])
 * @method static AuditChange findOrFail(int $id, array $columns = ['*'])
 * @method static AuditChange findOrNew(int $id, array $columns = ['*'])
 * @method static AuditChange sole(array $columns = ['*'])
 * @method static AuditChange first(array $columns = ['*'])
 * @method static AuditChange firstOrFail(array $columns = ['*'])
 * @method static AuditChange firstOrCreate(array $filter, array $values)
 * @method static AuditChange firstOrNew(array $filter, array $values)
 * @method static AuditChange|null firstWhere(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|AuditChange lockForUpdate()
 * @method static Builder|AuditChange select(array $columns = ['*'])
 * @method static Builder|AuditChange with(array|string  $relations)
 * @method static Builder|AuditChange leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder|AuditChange where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method static Builder|AuditChange whereIn(string $column, $values, $boolean = 'and', $not = false)
 * @method static Builder|AuditChange whereNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|AuditChange whereNotNull(string|array $columns, bool $boolean = 'and')
 * @method static Builder|AuditChange orderBy(string $column, string $direction = 'asc')
 *
 * @property int $id
 * @property int $record_id
 * @property bool $is_soft_deletion
 * @property string $path
 * @property string $method
 * @property string $new_value
 * @property string $old_value
 * @property string $ip_address
 * @property string $table_name
 * @property string $change_type
 * @property string $column_name
 * @property string $record_uuid
 * @property string $record_identifier
 * @property string $changed_by_user_id
 * @property ArrayObject $record_as_json
 * @property CarbonInterface $created_at
 * @property User $changed_by_user
 *
 * AUTO GENERATED FILE DO NOT MODIFY
 */
class AuditChange extends Model {
    protected $table = 'audit_change';
    protected $dateFormat = 'Y-m-d H:i:sO';
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'immutable_datetime',
        'record_as_json' => AsArrayObject::class,
    ];

    protected $guarded = ['id','updated_at','created_at','deleted_at'];

    public function changedByUser(): BelongsTo {
        return $this->belongsTo(User ::class, 'changed_by_user_id', 'id');
    }
}
