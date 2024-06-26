<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->user_type == 'admin') {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado.');
    }
}