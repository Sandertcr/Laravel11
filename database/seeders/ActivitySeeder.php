<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::factory()->create([
            'name' => 'Todo'
        ]);
        Activity::factory()->create([
            'name' => 'Doing'
        ]);
        Activity::factory()->create([
            'name' => 'Testing'
        ]);
        Activity::factory()->create([
            'name' => 'Verify'
        ]);
        Activity::factory()->create([
            'name' => 'Done'
        ]);
    }
}
