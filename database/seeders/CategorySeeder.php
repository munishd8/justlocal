<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::factory(5)->create();
        Category::create([
            'name' => 'Uncateogrized',
            'slug' => Str::slug('Uncateogrized'),
            'parent_location'=> 'Punjab',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.',
            'image' => 'https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg',
    ]);
    }
}
