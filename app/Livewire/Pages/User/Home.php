<?php

namespace App\Livewire\Pages\User;

use App\Models\Lab;
use Livewire\Component;

class Home extends Component
{
    public $labs;
    public $images;

    public function mount()
    {
        $labs = Lab::all();
        $this->labs = $labs;
        $this->images = [
            ["name" => "lab1"],
            ["name" => "lab2"],
            ["name" => "lab3"],
            ["name" => "lab4"],
            ["name" => "lab5"],
        ];
    }

    public function render()
    {
        return view('livewire.pages.user.home');
    }
}
