<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_id',
        'created_by',
        'subject_id',
        'effect_date',
        'end_date',
        'is_repeat',
        'report'
    ];

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approval()
    {
        return $this->hasOne(Approval::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    protected static function booted(): void
    {

        //creating approval that linked to this loan
        static::created(function (Loan $loan) {
            Approval::create(['loan_id' => $loan->id]);
        });
    }
}
