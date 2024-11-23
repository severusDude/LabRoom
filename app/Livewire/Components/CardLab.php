<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Str;

class CardLab extends Component
{
    public $lab;
    public $slug;
    public $id;
    public $data;


    public function mount($lab)
    {
        $this->lab = $lab;
        $this->slug = Str::slug($lab->lab_name);
        $this->id = $lab->id;
        $this->data = $lab->lab_name;
    }

    public function redirectTo($id)
    {
        return redirect("/user/loan/$id");
    }

    public function sendDataToLoanPage()
    {
        $this->dispatch("data-sent", ['data' => $this->data]);
        return redirect()->route('user.loan');
    }

    public function render()
    {
        return view('livewire.components.card-lab');
    }
}
