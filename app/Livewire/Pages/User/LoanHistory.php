<?php

namespace App\Livewire\Pages\User;

use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoanHistory extends Component
{
    // public $historyLoan;
    public $userId;

    public function mount()
    {
        $this->userId = Auth::id();
        // $this->historyLoan = Loan::with("lab", 'subject', "approval.user")->where("created_by", $this->userId)->orderBy("created_at", "desc")->get()->all();
    }

    public function render()
    {
        return view('livewire.pages.user.loan-history', [
            'historyLoan' => Loan::with("lab", 'subject', "approval.user")
                ->where("created_by", $this->userId)
                ->orderBy("created_at", "desc")
                ->paginate(5)
        ]);
    }
}
