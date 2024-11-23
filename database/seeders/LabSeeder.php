<?php

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labs = [
            [
                "lab_name" => "Laboratorium Dasar 1",
                "lab_desc" => "Laboratorium Dasar 1 dengan total device 40",
                "location" => "FT-1",
                "capacity" => 40,
            ],
            [
                "lab_name" => "Laboratorium Dasar 2",
                "lab_desc" => "Laboratorium Dasar 2 dengan total device 30",
                "location" => "FT-1",
                "capacity" => 30,
            ],
            [
                "lab_name" => "Laboratorium Dasar 3",
                "lab_desc" => "Laboratorium Dasar 3 dengan total device 20",
                "location" => "FT-2",
                "capacity" => 20,
            ],
            [
                "lab_name" => "Laboratorium Dasar 4",
                "lab_desc" => "Laboratorium Dasar 4 dengan total device 40",
                "location" => "FT-1",
                "capacity" => 40,
            ],
            [
                "lab_name" => "Laboratorium Dasar 5",
                "lab_desc" => "Laboratorium Dasar 5 dengan total device 30",
                "location" => "FT-3",
                "capacity" => 40,
            ],
        ];

        foreach ($labs as $lab) {
            $create_lab = Lab::create([
                "lab_name" => $lab["lab_name"],
                "lab_desc" => $lab["lab_desc"],
                "location" => $lab["location"],
                "capacity" => $lab["capacity"],
            ]);
        }
    }
}
