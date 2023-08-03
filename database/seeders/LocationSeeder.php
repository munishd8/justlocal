<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Location::where('name','None')->count() == 0)
        {
            Location::create([
            'name' => 'None',
            'parent_location'=> null,
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.',
            'image' => 'https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg',
    ]);
}

        \App\Models\Location::factory(5)->create();
    }
}
