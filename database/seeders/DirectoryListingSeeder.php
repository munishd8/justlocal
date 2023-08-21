<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DirectoryListing;
use Carbon\Carbon;

class DirectoryListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\DirectoryListing::factory(20)->create();

        foreach (DirectoryListing::all() as $directoryListings) {
           $categories = \App\Models\Category::where('menu_id', 3)->inRandomOrder()->take(rand(1,3))->pluck('id');
           $directoryListings->categories()->attach($categories);
           $locations = \App\Models\Location::all()->random()->id;
           $directoryListings->locations()->attach($locations);

           $directoryListings->images()->insert([
            'image' => 'images/directoryListing/image-42.png',
            'imageable_type' => 'App\Models\DirectoryListing',
            'imageable_id' => $directoryListings->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ]);
           
        }
    }
}
