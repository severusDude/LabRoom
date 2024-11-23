<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Str;

class CardLab extends Component
{
    public $lab;
    public $slug;
    public $id;


    public function mount($lab)
    {
        $this->lab = $lab;
        $this->slug = Str::slug($lab->lab_name);
        $this->id = $lab->id;
    }

    public function render()
    {
        return view('livewire.components.card-lab');
    }
}
