<?php

namespace App\Livewire\Pages\User;

use App\Models\Lab;
use Livewire\Component;

class Home extends Component
{
    public $labs;

    public function mount(){
        $labs = Lab::all();
        $this->labs = $labs;
    }

    public function render()
    {
        return view('livewire.pages.user.home');
    }
}
