<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Menu;

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
            'parent_category'=> Category::all()->random()->id,
            'menu_id'=> Menu::whereIn('id',[1,3])->inRandomOrder()->first()->id,
            'description' => fake()->paragraph,
            'image' => 'categories/posts/image-42.png',
        ];
    }
}
