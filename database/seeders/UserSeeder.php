<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $student = User::factory()->create([
            'name' => 'student',
            'email' => 'student@school.nl',
            'password' => 'student',
        ]);

        $student->assignRole('student');

        $teacher = User::factory()->create([
            'name' => 'teacher',
            'email' => 'teacher@school.nl',
            'password' => 'teacher',
        ]);

        $teacher->assignRole('teacher');

        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@school.nl',
            'password' => 'admin',
        ]);

        $admin->assignRole('admin');
    }
}
