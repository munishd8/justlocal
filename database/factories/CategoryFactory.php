<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentence;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'parent_location'=> fake()->word,
            'description' => fake()->paragraph,
            'image' => fake()->imageUrl(640, 480, 'animals', true),
        ];
    }
}
