<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isAdmin) {
            // If the user is not logged in or not an admin, redirect them or show an error
            return redirect('/')->with('error', 'You do not have access to this area.');
        }

        return $next($request);
    }
}
