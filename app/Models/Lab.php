<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    public function getAvailability(): bool
    {
        $now = now();

        $hasActiveLoans = $this->loans()
            ->whereHas('approval', function ($query) {
                $query->where('approval_status', 'Approved');
            })
            ->where('end_date', '>=', $now)
            ->exists();

        return !$hasActiveLoans;
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    protected $guarded = [];
}
