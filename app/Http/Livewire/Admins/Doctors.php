<?php

namespace App\Http\Livewire\Admins;

use App\Models\doctor;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Doctors extends Component
{
    use WithPagination, WithFileUploads;

    public $name, $specialty, $visiting_days = [], $qualification, $phone, $email, $bio, $image;
    public $is_active = true;
    public $doctor_id;
    public $isModal = false;
    public $search = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'specialty' => 'required|string|max:255',
        'visiting_days' => 'required|array|min:1',
        'qualification' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'bio' => 'nullable|string',
        'image' => 'nullable|image|max:1024',
        'is_active' => 'boolean',
    ];

    public function render()
    {
        $doctors = doctor::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('specialty', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admins.doctors', [
            'doctors' => $doctors
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModal = true;
    }

    public function closeModal()
    {
        $this->isModal = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->specialty = '';
        $this->visiting_days = [];
        $this->qualification = '';
        $this->phone = '';
        $this->email = '';
        $this->bio = '';
        $this->image = null;
        $this->is_active = true;
        $this->doctor_id = '';
    }

    public function store()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('doctors', 'public');
        }

        doctor::create([
            'name' => $this->name,
            'specialty' => $this->specialty,
            'visiting_days' => $this->visiting_days,
            'qualification' => $this->qualification,
            'phone' => $this->phone,
            'email' => $this->email,
            'bio' => $this->bio,
            'image' => $imagePath,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Doctor created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $doctor = doctor::findOrFail($id);
        $this->doctor_id = $id;
        $this->name = $doctor->name;
        $this->specialty = $doctor->specialty;
        $this->visiting_days = $doctor->visiting_days ?? [];
        $this->qualification = $doctor->qualification;
        $this->phone = $doctor->phone;
        $this->email = $doctor->email;
        $this->bio = $doctor->bio;
        $this->is_active = $doctor->is_active;

        $this->openModal();
    }

    public function update()
    {
        $this->validate();

        $doctor = doctor::find($this->doctor_id);
        
        $imagePath = $doctor->image;
        if ($this->image) {
            $imagePath = $this->image->store('doctors', 'public');
        }

        $doctor->update([
            'name' => $this->name,
            'specialty' => $this->specialty,
            'visiting_days' => $this->visiting_days,
            'qualification' => $this->qualification,
            'phone' => $this->phone,
            'email' => $this->email,
            'bio' => $this->bio,
            'image' => $imagePath,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Doctor updated successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        doctor::find($id)->delete();
        session()->flash('message', 'Doctor deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $doctor = doctor::find($id);
        $doctor->update(['is_active' => !$doctor->is_active]);
        session()->flash('message', 'Doctor status updated successfully.');
    }
}
