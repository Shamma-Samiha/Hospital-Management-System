<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
  {
     $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
       ]);

     $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => 2, // 2 = normal user
     ]);

    // Automatically log in the user after registration
    Auth::login($user);

    // Redirect to home page after auto-login
    return redirect('/')->with('success', 'Registration successful! Welcome to CareBase.');
   }
 
}
