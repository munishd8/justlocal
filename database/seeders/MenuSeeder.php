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
          Menu::create(['name' => 'Posts System', 'icon_class' => 'fa-table']);
          Menu::create(['name' => 'Death Notices', 'icon_class' => 'fa-columns']);
          Menu::create(['name' => 'Directory listings','icon_class' => 'fa-book']);
    }
}
