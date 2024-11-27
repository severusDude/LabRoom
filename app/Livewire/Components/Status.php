<?php

namespace App\Livewire\Components;

use Illuminate\View\ComponentAttributeBag;
use Livewire\Component;

class Status extends Component
{
    public string $label;
    public bool $large;

    public function mount($label = 'Label', $large = false)
    {
        $this->label = trim($label);
        $this->large = $large;
    }

    public function render()
    {
        return view('livewire.components.status', [
            'attributes' => new ComponentAttributeBag()
        ]);
    }
}
