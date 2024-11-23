<?php

namespace App\Livewire\Pages\User;

use App\Models\Lab;
use Livewire\Component;

class LabDetail extends Component
{
    public $slug;
    public $lab;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->lab = Lab::findOrFail($slug, 'id')->first();
        dd($this->lab);
    }
    public function render()
    {
        return view('livewire.pages.user.lab-detail');
    }
}
