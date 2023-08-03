<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DirectoryListing;

class DirectoryListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\DirectoryListing::factory(50)->create();

        foreach (DirectoryListing::all() as $directoryListings) {
           $categories = \App\Models\Category::where('menu_id', 3)->inRandomOrder()->take(rand(1,3))->pluck('id');
           $directoryListings->categories()->attach($categories);
           $locations = \App\Models\Location::all()->random()->id;
           $directoryListings->locations()->attach($locations);
           
        }
    }
}
