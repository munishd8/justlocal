<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactInformation;
use Illuminate\Support\Carbon;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ContactInformation::factory(20)->create();

        foreach (ContactInformation::all() as $ContactInformation) {

            $ContactInformation->images()->insert([
             'image' => 'images/directoryListing/contact/image-42.png',
             'imageable_type' => 'App\Models\ContactInformation',
             'imageable_id' => $ContactInformation->id,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
            ]);
            
         }
    }
}
