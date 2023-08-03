<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
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
                'address' => fake()->streetAddress(),
                'phone' => fake()->date(),
                'email' => fake()->companyEmail(),
                'website' => fake()->url(),

        ];
    }
}
