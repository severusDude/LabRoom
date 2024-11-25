<?php

namespace App\Livewire\Components;

use Carbon\Carbon;
use Livewire\Component;

class CardHistory extends Component
{
    public $history;
    public $startTime;
    public $endTime;
    public $status;
    public $approvedBy;
    public function mount()
    {
        $this->startTime = Carbon::parse($this->history->effect_date)->format('H:i');
        $this->endTime = Carbon::parse($this->history->end_date)->format('H:i');
        $this->status = $this->history->approval->approval_status;
        $this->approvedBy = $this->history->approval->user->name ?? "-";
    }
    public function render()
    {
        return view('livewire.components.card-history');
    }
}
