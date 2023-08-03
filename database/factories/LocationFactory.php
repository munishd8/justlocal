<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>fake()->sentence,
            'parent_location'=> Location::all()->random()->id,
            'description' => fake()->paragraph(3),
            'image' => fake()->imageUrl(640, 480, 'animals', true),
        ];

    }
}
