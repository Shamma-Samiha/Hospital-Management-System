<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDoctorController extends Controller
{
    public function index()
    {
        $doctors = doctor::orderBy('created_at', 'desc')->paginate(10);
        return view('admins.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admins.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'room' => 'required|string|max:255',
            'visiting_hours' => 'required|string|max:255',
            'visiting_days' => 'required|array|min:1',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:1024',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('doctors', 'public');
        }

        // Create an employee record first
        $employee = \App\Models\employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ?? null,
            'qualification' => $request->qualification ?? null,
            'position' => 'Doctor',
            'status' => 'Active',
            'image' => $imagePath,
        ]);

        doctor::create([
            'name' => $request->name,
            'specialty' => $request->specialty,
            'room' => $request->room,
            'visiting_hours' => $request->visiting_hours,
            'visiting_days' => $request->visiting_days,
            'email' => $request->email,
            'image' => $imagePath,
            'is_active' => true,
            'employee_id' => $employee->id,
        ]);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor added successfully!');
    }

    public function edit($id)
    {
        $doctor = doctor::findOrFail($id);
        return view('admins.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = doctor::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'room' => 'required|string|max:255',
            'visiting_hours' => 'required|string|max:255',
            'visiting_days' => 'required|array|min:1',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:1024',
        ]);

        $imagePath = $doctor->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('doctors', 'public');
        }

        // Update the associated employee record
        if ($doctor->employee_id) {
            $employee = \App\Models\employee::find($doctor->employee_id);
            if ($employee) {
                $employee->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone ?? $employee->phone,
                    'qualification' => $request->qualification ?? $employee->qualification,
                    'image' => $imagePath,
                ]);
            }
        }

        $doctor->update([
            'name' => $request->name,
            'specialty' => $request->specialty,
            'room' => $request->room,
            'visiting_hours' => $request->visiting_hours,
            'visiting_days' => $request->visiting_days,
            'email' => $request->email,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy($id)
    {
        $doctor = doctor::findOrFail($id);
        
        // Delete the associated employee record
        if ($doctor->employee_id) {
            $employee = \App\Models\employee::find($doctor->employee_id);
            if ($employee) {
                $employee->delete();
            }
        }
        
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}
