<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanningApplication>
 */
class PlanningApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name' => fake()->userName(),
                'details' => fake()->paragraph(3),
                'applicant_name' => fake()->userName(),
                'planning_reference' => fake()->paragraph(1),
                'registration_date' => fake()->date(),
        ];
    }
}
