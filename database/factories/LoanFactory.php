<?php

namespace Database\Factories;

use App\Models\Lab;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $effect_date = fake()->dateTimeBetween(now(), now()->endOfMonth());

        // Snap to the nearest 30-minute interval
        $effect_date = Carbon::instance($effect_date)->setMinutes(floor($effect_date->format('i') / 30) * 30)->setSeconds(0);

        $end_date = Carbon::instance($effect_date)->addHours(rand(1, 4));
        $created_by = User::query()->whereHas('roles', function ($query) {
            $query->where('name', 'standard');
        })->get();

        return [
            'lab_id' => Lab::all()->random()->id,
            'created_by' => $created_by->random()->id,
            'subject_id' => Subject::all()->random()->id,
            'effect_date' => $effect_date,
            'end_date' => $end_date,
            'is_repeat' => false,
        ];
    }
}
