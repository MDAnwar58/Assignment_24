<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organization' => fake()->name(),
            'title' => fake()->title(),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'location' => fake()->address(),
            'description' => fake()->paragraph(),
        ];
    }
}
