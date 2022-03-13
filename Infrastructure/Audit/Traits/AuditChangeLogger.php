<?php

namespace Infrastructure\Audit\Traits;

use Closure;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Infrastructure\Audit\Crud\AuditChangeCreator;
use Infrastructure\Audit\Utility\Extractors;
use Throwable;

/**
 * @method static created(Closure $param)
 * @method static deleted(Closure $param)
 * @method static updating(Closure $param)
 */
trait AuditChangeLogger {
    public static function bootAuditChangeLogger(): void {
        self::created(static function ($model) {
            try {
                $keys = Extractors::extraPrimaryKeyArray($model);
                AuditChangeCreator::create(
                    table_name: $model->getTable(),
                    change_type: 'CREATE',
                    record_id: $keys[0], record_uuid: $keys[1], record_identifier: $keys[2],
                    record_data: Extractors::extractAuditColumns($model),
                );
            } catch (Throwable $t) {

            }
        });


        self::deleted(static function ($model) {
            try {
                // If the model is removed from the database or only soft deleted.
                $soft_deleted = method_exists($model, 'isForceDeleting') && !$model->isForceDeleting();
                $keys = Extractors::extraPrimaryKeyArray($model);
                AuditChangeCreator::create(
                    table_name: $model->getTable(),
                    change_type: 'DELETE',
                    record_id: $keys[0], record_uuid: $keys[1], record_identifier: $keys[2],
                    is_soft_deletion: $soft_deleted,
                    record_data: Extractors::extractAuditColumns($model),
                );
           } catch (Throwable $t) {

            }
        });

        self::updating(static function ($model) {
            try {
                $keys = Extractors::extraPrimaryKeyArray($model);

                $ignore_columns = $model->audit_ignore_columns ?? [];
                foreach ($model->getDirty() as $column_name => $new_value) {
                    if (in_array($column_name, $ignore_columns, true))  {
                        continue;
                    }
                    $old_value = $model->getOriginal($column_name);
                    if (str_starts_with($column_name, 'encrypted_')) {
                        $new_value = 'HIDDEN';
                        $old_value = 'HIDDEN';
                    }
                    // If old_value is array
                    if (is_array($old_value) || $old_value instanceof ArrayObject) {
                        $old_value = json_encode($old_value, JSON_THROW_ON_ERROR);
                    }
                    // If new_value is array
                    if (is_array($new_value) || $new_value instanceof  ArrayObject) {
                        $new_value = json_encode($new_value, JSON_THROW_ON_ERROR);
                    }

                    AuditChangeCreator::create(
                        table_name: $model->getTable(),
                        change_type: 'UPDATE',
                        record_id: $keys[0], record_uuid: $keys[1], record_identifier: $keys[2],
                        column_name: $column_name,
                        old_value: $old_value,
                        new_value: $new_value,
                    );
                }
            } catch (Throwable $t) {
                //TODO log error
            }
        });
    }
}