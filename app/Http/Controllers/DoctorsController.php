<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = doctor::where('is_active', true)
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        return view('docter', compact('doctors'));
    }
}
