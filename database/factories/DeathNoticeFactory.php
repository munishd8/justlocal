<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeathNotice>
 */
class DeathNoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'title' => fake()->word(),
                'content' => fake()->paragraph(3),
                'date_of_birth' => fake()->date(),
                'date_of_death' => fake()->date(),
                'notice_date' => fake()->date(),
                'notice_link' => fake()->url(),
                'link' => fake()->url(),
        ];

    }
}
