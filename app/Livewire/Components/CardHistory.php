<?php

namespace App\Livewire\Components;

use Carbon\Carbon;
use Livewire\Component;

class CardHistory extends Component
{
    public $history;
    public $date;
    public $startTime;
    public $endTime;
    public $status;
    public $approvedBy;
    public $image;


    public function mount()
    {
        $this->date = Carbon::parse($this->history->effect_date)->format('l, d F');
        $this->startTime = Carbon::parse($this->history->effect_date)->format('H:i');
        $this->endTime = Carbon::parse($this->history->end_date)->format('H:i');
        $this->status = $this->history->approval->approval_status;
        $this->approvedBy = $this->history->approval->user->name ?? "-";

        switch ($this->history->lab->lab_name) {
            case 'Laboratorium Dasar 1':
                $this->image = 'lab1';
                break;
            case 'Laboratorium Dasar 2':
                $this->image = 'lab2';
                break;
            case 'Laboratorium Dasar 3':
                $this->image = 'lab3';
                break;
            case 'Laboratorium Dasar 4':
                $this->image = 'lab4';
                break;
            case 'Laboratorium Dasar 5':
                $this->image = 'lab5';
                break;
            default:
                $this->image = 'default';
                break;
        }
    }
    public function render()
    {
        return view('livewire.components.card-history');
    }
}
