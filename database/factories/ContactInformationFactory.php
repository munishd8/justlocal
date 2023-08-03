<?php

namespace Database\Factories;

use App\Models\DirectoryListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactInformation>
 */
class ContactInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'directory_listing_id' => DirectoryListing::all()->unique()->random()->id,
            'hide_contact' => fake()->randomElement([0, 1]),
            'zip_code' => fake()->randomNumber(7, true),
            'fax' => fake()->randomNumber(5, true),
            'email' => fake()->safeEmail(),
            'website' => fake()->url(),
            'contact_excerpt' => fake()->paragraph(1),
            'contact_info_content' => fake()->paragraph(3),
        ];
    }
}
