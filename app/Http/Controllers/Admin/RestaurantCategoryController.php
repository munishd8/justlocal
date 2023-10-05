<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Restaurant;

class RestaurantCategoryController extends Controller
{
    public function index()
    {

    $restaurantCategories = Category::with('parent')->where('menu_id',2)->get();

                       $parents = $restaurantCategories->map(function ($category) {
        return $category->parent;
    })->unique();

        return view('admin.restaurants.category', compact('restaurantCategories','parents'));

    }

// public function edit($id)
// {
//     $restaurant = Restaurant::with('categories')->find($id);
//     // $postCategories = Category::with('parent')->where('menu_id',1)->get();
//     $restaurantCategories = Category::restaurantCategorytree();
//     return view('admin.restaurants.edit', compact('restaurant', 'restaurantCategories'));
// }

public function edit($id)
{
    $postCategories = Category::with('parent')
        ->where('menu_id',1)
        ->where('id','!=',$id)
        ->get();

    $parents = $postCategories->map(function ($category) {
return $category->parent;
})->unique();
    $category = Category::findOrFail($id);
    return view('admin.posts.editCategory',compact('category','postCategories'));
}


}
