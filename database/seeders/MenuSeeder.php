<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Menu::create(['name' => 'Posts System']);
          Menu::create(['name' => 'Death Notices']);
          Menu::create(['name' => 'Directory listings']);
    }
}
