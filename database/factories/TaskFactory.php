<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'task' => $this->faker->sentence(5),
            'begindate' => Carbon::today(),
            'enddate' => Carbon::today()->addDays(9),
            'user_id' => null,
            'project_id' => Project::all()->random()->id,
            'activity_id' => Activity::all()->random()->id
        ];
    }
}
