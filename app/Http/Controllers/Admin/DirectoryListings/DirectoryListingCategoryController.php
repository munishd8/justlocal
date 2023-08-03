<?php

namespace App\Http\Controllers\Admin\DirectoryListings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class DirectoryListingCategoryController extends Controller
{
    public function index()
    {

    $directoryListingCategories = Category::with('parent')->where('menu_id',3)->get();

                       $parents = $directoryListingCategories->map(function ($category) {
        return $category->parent;
    })->unique();

        return view('admin.directoryListings.category', compact('directoryListingCategories','parents'));

    }
}
