<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DemandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->sentence,
            'attached_issue' => $this->faker->paragraph(),
            'budgeted_hours' => $this->faker->paragraph(),
            'sector_id' => 1,
            'user_id' => 1,
            'system_id' => 1,
            'demands_type_id' => 1,
            'started_at' => $this->faker->date(),
            'ended_at' => $this->faker->date(),
        ];
    }
}
