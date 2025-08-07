<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = doctor::where('is_active', true)
                        ->orderBy('created_at', 'desc')
                        ->take(6)
                        ->get();
        
        return view('index', compact('doctors'));
    }
}
