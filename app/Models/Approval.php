<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = [
        'loan_id',
        'approval_status',
    ];

    public function reject_loan()
    {
        $this->approved_by = auth()->user()->id;
        $this->approval_status = 'Rejected';
        $this->save();
    }

    public function approve_loan()
    {
        $this->approved_by = auth()->user()->id;
        $this->approval_status = 'Approved';
        $this->save();
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
