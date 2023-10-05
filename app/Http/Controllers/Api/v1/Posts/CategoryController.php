<?php

namespace App\Http\Controllers\Api\v1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\CategoryPostsResource;
use App\Http\Resources\Posts\CategoryResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function categories()
    {
        return CategoryResource::collection(Category::postCategoryTree());
    }

    public function listPosts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return CategoryPostsResource::collection($category->posts);
    }

    
}
