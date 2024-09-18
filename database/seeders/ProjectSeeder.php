<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\Task;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->times(20)
            ->has(Task::factory()->times(5))
            ->create();
    }
}
