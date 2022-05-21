<?php

namespace Infrastructure\Http\Middleware;

use Closure;
use GuardsmanPanda\Larabear\Service\Req;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Infrastructure\Auth\Service\Auth;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

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
                DB::rollBack();
                if ($idempotency_key !== null) {
                    DB::delete("DELETE FROM z_idempotency WHERE idempotency_key = ?", [$idempotency_key]);
                }
                return $resp;
            }
            DB::commit();
            return $resp;
        } catch (Throwable $t) {
            DB::rollBack();
            if ($idempotency_key !== null) {
                DB::delete("DELETE FROM z_idempotency WHERE idempotency_key = ?", [$idempotency_key]);
            }
            throw $t;
        }
    }
}