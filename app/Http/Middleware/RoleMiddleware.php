<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware untuk membatasi akses route berdasarkan role user.
 *
 * Cara pakai di route:
 *   Route::middleware('role:owner,manager')->...
 *
 * Role yang tersedia (string di kolom users.role):
 *   - owner     => Owner (akses tertinggi)
 *   - manager   => Manajer Toko
 *   - supervisor => Supervisor
 *   - cashier   => Kasir
 *   - warehouse => Pegawai Gudang
 *
 * TODO Backend: Jika perlu hierarchy level, bisa dikembangkan di sini
 * contoh: level: owner=5, manager=4, supervisor=3, cashier=2, warehouse=1
 * lalu cek jika level user >= level minimum yang dibutuhkan.
 */
class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
