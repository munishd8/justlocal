<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LocalEat;
use Illuminate\Support\Carbon;

class LocalEatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\LocalEat::factory(20)->create();

        foreach (LocalEat::all() as $LocalEat) {
            $LocalEat->images()->insert([
             'image' => 'images/localEats/image-42.png',
             'imageable_type' => 'App\Models\LocalEat',
             'imageable_id' => $LocalEat->id,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
            ]);
            
         }
    }
}
