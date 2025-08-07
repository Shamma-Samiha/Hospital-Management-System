<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id == 2) {
            return $next($request);
        } else {
            if (Auth::check()) {
                // User is logged in but has wrong role, redirect to appropriate dashboard
                if (Auth::user()->role_id == 1) {
                    return redirect('/admin/dashboard');
                }
            }
            return redirect('/login')->with('error', 'Access denied. User privileges required.');
        }
    }
}
