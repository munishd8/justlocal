<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Carbon;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\Restaurant::factory(20)->create();
         foreach (Restaurant::all() as $Restaurant) {
            $Restaurant->images()->insert([
             'image' => 'images/localEats/image-42.png',
             'imageable_type' => 'App\Models\Restaurant',
             'imageable_id' => $Restaurant->id,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
            ]);
            
         }
    }
}
