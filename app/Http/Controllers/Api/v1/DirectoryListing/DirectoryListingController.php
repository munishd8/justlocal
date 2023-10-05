<?php

namespace App\Http\Controllers\Api\v1\DirectoryListing;

use App\Http\Controllers\Controller;
use App\Http\Resources\DirectoryListing\DirectoryListingResource;
use App\Models\DirectoryListing;

class DirectoryListingController extends Controller
{
    public function index()
    {
        $directoryListings = DirectoryListing::with(['images','contactInformation.contactNumbers'])->latest('id')->get();
        return DirectoryListingResource::collection($directoryListings);
    }

    public function singleListing($slug)
    {
        $directoryListings = DirectoryListing::with(['images', 'contactInformation.contactNumbers'])->where('slug', $slug)->first();
        return new DirectoryListingResource($directoryListings);
    }
}
