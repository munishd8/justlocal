<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {


                         $postCategories = Category::with('parent')->where('menu_id',1)->get();
        return view('admin.posts.create', [
            'postCategories' => $postCategories,
        ]);
    }
        public function trash()
    {
        return view('admin.posts.trash');
    }
    
}
