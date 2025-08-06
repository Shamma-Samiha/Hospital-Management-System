<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view("admins.login");
    }

    public function authenticate_admin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

           if (Auth::attempt($credentials)) {
              $user = Auth::user();

              if ($user->role_id == 1) {
                return redirect()->intended('admin/dashboard');}
             elseif ($user->role_id == 2) {
                return redirect()->intended('user/dashboard');}
           else {
              Auth::logout(); // unexpected role
              return redirect('/login')->with('error', 'Unauthorized role.');
            }
}


        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }
}
