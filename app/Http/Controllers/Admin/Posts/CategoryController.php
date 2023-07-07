<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

    $postCategories = Category::with('parent')->where('menu_id',1)->get();

                       $parents = $postCategories->map(function ($category) {
        return $category->parent;
    })->unique();

        return view('admin.posts.category', compact('postCategories','parents'));

    }
}
