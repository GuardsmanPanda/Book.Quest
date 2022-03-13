<?php

namespace Infrastructure\Http\Middleware;

use _PHPStan_c1b7ff984\Throwable;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Infrastructure\Auth\Service\Auth;
use Infrastructure\Http\Service\Req;
use Symfony\Component\HttpFoundation\Response;

class Integrity {
    public function handle(Request $request, Closure $next): Response {
        if (!Req::isWriteRequest()) {
            return $next($request);
        }
        $idempotency_key = $request->header('idempotency-key') ?? $request->input('_idempotency');
        if ($idempotency_key !== null) {
            DB::insert("INSERT INTO z_idempotency (idempotency_key, user_id, http_verb, http_path) VALUES (?, ?, ?, ?)", [$idempotency_key, Auth::id(), $request->getMethod(), $request->path()]);
        }

        try {
            DB::beginTransaction();
            $resp = $next($request);
            if ($resp->getStatusCode() >= 400) {
                abort(400, $resp->getContent());
            }
            DB::commit();
            return $resp;
        } catch (Throwable $t) {
            DB::rollBack();
            if ($idempotency_key !== null) {
                DB::delete("DELETE FROM z_idempotency WHERE idempotency_key = ?", [$idempotency_key]);
            }
            return response()->json(['error' => $t->getMessage()], $t->getCode());
        }
    }
}