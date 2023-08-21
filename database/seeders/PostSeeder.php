<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\Post::factory(20)->create();

         foreach (Post::all() as $posts) {
            $categories = \App\Models\Category::where('menu_id', 1)->inRandomOrder()->take(rand(1,3))->pluck('id');
            $posts->categories()->attach($categories);

                $posts->images()->insert([
                 'image' => 'images/posts/image-42.png',
                 'imageable_type' => 'App\Models\Post',
                 'imageable_id' => $posts->id,
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
                ]);
                
             
         }
        
    }
}
