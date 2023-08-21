<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeathNotice;
use Illuminate\Support\Carbon;

class DeathNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\DeathNotice::factory(20)->create();

         foreach (DeathNotice::all() as $DeathNotice) {

            $DeathNotice->images()->insert([
             'image' => 'images/death-notices/image-42.png',
             'imageable_type' => 'App\Models\DeathNotice',
             'imageable_id' => $DeathNotice->id,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
            ]);
            
         }

    }
}
