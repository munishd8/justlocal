<?php

namespace App\Http\Controllers\Api\v1\Restaurants;

use App\Http\Controllers\Controller;
use App\Http\Resources\Restaurants\RestaurantsResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('images')->latest()->get();
        return RestaurantsResource::collection($restaurants);
    }
}
