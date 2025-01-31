<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


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
            'title'=>$this->faker->sentence(3),
            'description'=>$this->faker->paragraph(3),
            'due_date'=>$this->faker->randomElement([null, $this->faker->dateTimeBetween('now', '+1 year')]),
            'completed_at'=>$this->faker->randomElement([null, $this->faker->dateTimeBetween('now', '+1 year')]),
            'slug'=>$this->faker->unique()->slug(),
            'user_id'=>User::factory(),
        ];
    }
}
