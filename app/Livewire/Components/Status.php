<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Status extends Component
{
    public string $label;
    public string $class;
    public bool $large;

    public function mount($label = 'Label', $class = '', $large = false)
    {
        $this->label = trim($label);
        $this->class = $class;
        $this->large = $large;
    }

    public function render()
    {
        return view('livewire.components.status');
    }
}
