<?php

namespace Infrastructure\Audit\Crud;

use GuardsmanPanda\Larabear\Service\Req;
use Illuminate\Support\Facades\DB;
use Infrastructure\Auth\Service\Auth;

class AuditChangeCreator {
    /**
     * @param string $table_name
     * @param string $change_type
     * @param int|null $record_id
     * @param string|null $record_uuid
     * @param string|null $record_identifier
     * @param string|null $column_name
     * @param string|null $old_value
     * @param string|null $new_value
     * @param bool $is_soft_deletion
     * @param array<string, mixed>|null $record_data
     * @return void
     * @throws \JsonException
     */
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
        $method = Req::method();
        $path = Req::path();
        $ip = Req::ip();

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