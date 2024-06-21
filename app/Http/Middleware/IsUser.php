<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id == 2) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
