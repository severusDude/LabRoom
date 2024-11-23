<?php

namespace App\Livewire\Pages\User;

use Livewire\Attributes\On;
use Livewire\Component;

class LoanUser extends Component
{
    public $receivedData;

    #[On("data-sent")]
    public function handleData($data)
    {
        dd('Menerima event data-sent', $data); // Debugging
        $this->receivedData = $data['data'] ?? 'Tidak ada data yang diterima';
    }

    public function render()
    {
        return view('livewire.pages.user.loan-user', ['data' => $this->receivedData]);
    }
}
