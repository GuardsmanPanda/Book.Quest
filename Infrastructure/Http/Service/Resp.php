<?php

namespace Infrastructure\Http\Service;

use Illuminate\Support\Facades\DB;
use Infrastructure\Http\Middleware\Initiate;
use Symfony\Component\HttpFoundation\JsonResponse;

class Resp {
    public static function SQLJson(string $sql, array $data = []): JsonResponse {
        return new JsonResponse(DB::select("
            SELECT json_agg(t) FROM ($sql) t
        ", $data)[0]->json_agg ?? '[]', json: true);
    }

    public static function SQLJsonSingle(string $sql, array $data = []): JsonResponse {
        return new JsonResponse(DB::selectOne($sql, $data));
    }

    public static function header(string $name, string $value): void {
        Initiate::$headers[$name] = $value;
    }
}