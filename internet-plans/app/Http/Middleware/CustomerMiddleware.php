<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->user_type == 'customer') {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado.');
    }
}
