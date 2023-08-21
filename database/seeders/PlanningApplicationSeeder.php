<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlanningApplication;
use Illuminate\Support\Carbon;

class PlanningApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\PlanningApplication::factory(20)->create();
         foreach (PlanningApplication::all() as $PlanningApplication) {
            $PlanningApplication->images()->insert([
             'image' => 'images/planningApplication/image-42.png',
             'imageable_type' => 'App\Models\PlanningApplication',
             'imageable_id' => $PlanningApplication->id,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
            ]);
            
         }
    }
}
