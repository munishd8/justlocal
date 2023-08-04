<?php

namespace App\Http\Controllers\Api\v1\DirectoryListing;

use App\Http\Controllers\Controller;
use App\Http\Resources\DirectoryListing\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return CategoryResource::collection(Category::directoryListingCategorytree());
    }
}
