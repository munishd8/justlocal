<?php

namespace App\Http\Controllers\Api\v1\DirectoryListing;

use App\Http\Controllers\Controller;
use App\Http\Resources\DirectoryListing\CategoryDirectoryListingsResource;
use App\Http\Resources\DirectoryListing\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // public function __invoke(Request $request)
    // {
    //     return CategoryResource::collection(Category::directoryListingCategorytree());
    // }

    public function categories()
    {
        return CategoryResource::collection(Category::directoryListingCategorytree());
    }

    public function listDirectoryListings($slug)
    {
       $category = Category::where('slug', $slug)->firstOrFail(); //directorylistings
    //    return $category->directorylistings;
       return CategoryDirectoryListingsResource::collection($category->directorylistings);
        // return CategoryPostsResource::collection($category->posts);
    }
}
