<?php

namespace Infrastructure\Audit\Crud;

use Illuminate\Support\Facades\DB;
use Infrastructure\Auth\Auth;

class AuditChangeCreator {
    public static function create(
        string $table_name,
        string $change_type,
        int $record_id = null,
        string $record_uuid = null,
        string $record_identifier = null,
        string $column_name = null,
        string $old_value = null,
        string $new_value = null,
        bool $is_soft_deletion = false,
        array $record_data = null
    ): void {
        $method = request()?->method();
        $path = request()?->path();
        $ip = request()?->ip();

        DB::insert("
            INSERT INTO audit_change (
                table_name,
                record_id, record_uuid, record_identifier,
                column_name,
                old_value, new_value,
                record_as_json, 
                change_type, is_soft_deletion,                      
                changed_by_user_id,
                method, path, ip_address
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ", [
            $table_name,
            $record_id, $record_uuid, $record_identifier,
            $column_name,
            $old_value, $new_value,
            $record_data === null ? null : json_encode($record_data, JSON_THROW_ON_ERROR),
            $change_type, $is_soft_deletion,
            Auth::id(),
            $method, $path, $ip
        ]);
    }
}