<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role_id == 1) {
            return redirect('/admin/dashboard');
        } elseif ($user->role_id == 2) {
            return redirect('/user/dashboard');
        } else {
            Auth::logout();
            return redirect('/login')->with('error', 'Unauthorized role.');
        }
    }
}
