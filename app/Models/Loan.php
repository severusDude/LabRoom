<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public static function booted(): void
    {
        static::creating(function (Loan $loan) {
            // get lab id
            $lab_id = $loan->lab_id;

            // current lab id count
            $current_id = self::where('lab_id', $lab_id)->withTrashed()->count();
            $new_id = $current_id ? $current_id + 1 : 1;

            // set new_id for id
            $loan->id = $new_id;
        });
    }
}
