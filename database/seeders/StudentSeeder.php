<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::created([
            'nis' => '1234567890',
            'name' => 'John Doe',
            'rombel_id' => 1,
            'rayon_id' => 1,
        ]);
    }
}
