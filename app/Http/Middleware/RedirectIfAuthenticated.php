<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                
                if ($user->role_id == 1) {
                    return redirect('/admin/dashboard');
                } elseif ($user->role_id == 2) {
                    return redirect('/user/dashboard');
                }
            }
        }

        return $next($request);
    }
}
