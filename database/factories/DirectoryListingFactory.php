<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DirectoryListing>
 */
class DirectoryListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $is_card_view_featured = fake()->randomElement([0, 1]);
       $is_local_support_view_featured = fake()->randomElement([0, 1]);
        return [
            'title' => fake()->word(),
            'content' => fake()->paragraph(3),
            'is_card_view_featured' => $is_card_view_featured,
            'card' => $is_card_view_featured ? 'images/directoryListing/card/image-42.png' : null,
            'is_local_support_view_featured' => $is_local_support_view_featured,
            'local_support_image' => $is_local_support_view_featured ? 'images/directoryListing/localSupport/image-42.png' : null,
            'excerpt' => fake()->paragraph(1),
            'address' => fake()->secondaryAddress(),
            'video_url' => fake()->randomElement(['https://www.youtube.com/watch?v=5hPtU8Jbpg0', 'https://www.youtube.com/watch?v=_sx5QZA-jr8','https://www.youtube.com/watch?v=wwrPL2CWg1I&pp=ygUSc2FtcGxlIHZpZGVvIDEgbWlu']),
        ];
    }
}
