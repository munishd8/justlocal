<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Menu;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                Category::create([
            'name' => 'Uncategorized',
            // 'slug' => Str::slug('Uncategorized'),
            'parent_category'=> 1,
            'menu_id'=> 1,
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.',
            'image' => 'https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg',
    ]);

        \App\Models\Category::factory(5)->create();

    }
}
