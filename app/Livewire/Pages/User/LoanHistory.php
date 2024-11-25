<?php

namespace App\Livewire\Pages\User;

use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoanHistory extends Component
{
    public $historyLoan;
    public $userId;

    public function mount()
    {
        $this->userId = Auth::id();
        $this->historyLoan = Loan::with("lab", 'subject', "approval.user")->where("created_by", $this->userId)->get()->all();
    }

    public function render()
    {
        return view('livewire.pages.user.loan-history');
    }
}
