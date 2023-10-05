<?php

namespace App\Http\Controllers\Api\v1\DirectoryListing;

use App\Http\Controllers\Controller;
use App\Http\Resources\DirectoryListing\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return LocationResource::collection(Location::locationTree());
    }
}
