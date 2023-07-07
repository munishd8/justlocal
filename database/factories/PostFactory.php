<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
                'excerpt' => fake()->paragraph(1),
                'is_featured' => fake()->randomElement([0, 1]),
                // 'category_id' => Category::where('menu_id', 1)->pluck('id')->random(),
        ];
    }
}
