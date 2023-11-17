<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role === 'admin') {
            return $next($request);
        }
        // return $next($request);
        return redirect('/');
    }
}
