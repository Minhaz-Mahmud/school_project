<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateWithSession
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('user_id')) {
            return redirect('login'); // Redirect to login if not authenticated
        }

        return $next($request);
    }
}

// Apply middleware in routes if using custom middleware without Kernel
