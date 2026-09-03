<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Allow only users with email admin@lekkiashram.com (or any admin check)
        if ($request->user() && $request->user()->email === 'admin@lekkiashram.com') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}