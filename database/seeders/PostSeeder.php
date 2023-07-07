<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\Post::factory(50)->create();

         foreach (Post::all() as $posts) {
            $categories = \App\Models\Category::where('menu_id', 1)->inRandomOrder()->take(rand(1,3))->pluck('id');
            $posts->categories()->attach($categories);
         }
        
    }
}
