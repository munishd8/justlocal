<?php

namespace App\Http\Controllers\Api\v1\Restaurants;

use App\Http\Controllers\Controller;
use App\Http\Resources\Restaurants\CategoryResource;
use App\Http\Resources\Restaurants\RestaurantsResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\Restaurants\CategoryRestuarantsResource;

class RestaurantsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('images')->latest()->get();
        return RestaurantsResource::collection($restaurants);
    }

    public function categories()
    {
        return CategoryResource::collection(Category::restaurantCategorytree());
    }


    

    public function listRestaurants($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return CategoryRestuarantsResource::collection($category->restaurants);
    }

    
}
