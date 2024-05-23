<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('u_user')) {
            return redirect('u_login')->withErrors('You need to login first.');
        }

        return $next($request);
    }
}
