<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create(['name' => 'Rekayasa Perangkat Lunak']);
        Subject::create(['name' => 'Pemrograman Berbasis Objek']);
        Subject::create(['name' => 'Statistika dan Probabilitas']);
    }
}
