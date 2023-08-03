<?php

namespace Database\Seeders;

use App\Models\ContactInformation;
use App\Models\PhoneType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhoneType::create([
            'type_name' => 'Phone',
        ]);
        PhoneType::create([
            'type_name' => 'Phone 2',
        ]);
        PhoneType::create([
            'type_name' => 'Phone 3',
        ]);
        PhoneType::create([
            'type_name' => 'Phone 4',
        ]);
    
        $phoneType = PhoneType::all()->pluck('id');
        $contactInformations = ContactInformation::distinct()->inRandomOrder()->pluck('id');
        foreach (ContactInformation::all() as $contactInformation) {
            $contactInformation = $contactInformations->random();
            $phoneType->contactNumbers()->attach($contactInformation, ['phone_number' => rand(1000, 10000000)]);
        }

    }
    


}
