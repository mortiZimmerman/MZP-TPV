<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Si no está autenticado o el rol no coincide, aborta con 403
        if (! $request->user() || $request->user()->role !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
