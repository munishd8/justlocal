<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Exports\RestaurantsExport;
use Maatwebsite\Excel\Excel;
use App\Models\Category;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.restaurants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $restaurantCategories = Category::restaurantCategorytree();
        return view('admin.restaurants.create', [
            'restaurantCategories' => $restaurantCategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    //  public function edit($id)
    //  {
    //      $post = Post::with('categories')->find($id);
    //      // $postCategories = Category::with('parent')->where('menu_id',1)->get();
    //      $postCategories = Category::postCategoryTree();
    //      return view('admin.posts.edit', compact('post', 'postCategories'));
    //  }
     
    // public function edit(string $id)
    // {
    //     $restaurant =  Restaurant::findOrFail($id);

    //     return view('admin.restaurants.edit',compact('restaurant'));
    // }

    public function edit($id)
    {
        $restaurant = Restaurant::with('categories')->find($id);
        $restaurantCategories = Category::restaurantCategorytree();
        return view('admin.restaurants.edit', compact('restaurant', 'restaurantCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function trash()
    {
        
        return view('admin.restaurants.trash');
    }

    public function export()
    {
        return (new RestaurantsExport)->download('restaurants.csv', Excel::CSV, ['Content-Type' => 'text/csv']);

    }
}
