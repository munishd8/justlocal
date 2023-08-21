<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transport;
use Illuminate\Support\Carbon;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\Transport::factory(20)->create();
         foreach (Transport::all() as $Transport) {
            $Transport->images()->insert([
             'image' => 'images/localEats/image-42.png',
             'imageable_type' => 'App\Models\Transport',
             'imageable_id' => $Transport->id,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
            ]);
            
         }
    }
}
