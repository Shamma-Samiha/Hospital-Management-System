<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\doctor;

class Search extends Component
{
    public $item;
    public $results = [];

    public function updatedItem()
    {
        $this->search();
    }

    public function search()
    {
        if (strlen($this->item) > 2) {
            $this->results = doctor::where('name', 'like', '%' . $this->item . '%')
                ->orWhere('specialty', 'like', '%' . $this->item . '%')
                ->where('is_active', true)
                ->get();
        } else {
            $this->results = [];
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
