<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function __invoke(Request $request, Closure $next)
    {
        if (Auth::user()?->role !== 'admin') {
            abort(403, 'No tienes permiso para acceder.');
        }
        return $next($request);
    }
}
