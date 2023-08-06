<?php

namespace App\Http\Controllers\Admin\DirectoryListings;

use App\Http\Controllers\Controller;
use App\Models\Location;

class DirectoryListingLocationController extends Controller
{
    public function index()
    {

    $directoryListingLocations = Location::with('parent')->latest('updated_at')->get();

                       $parents = $directoryListingLocations->map(function ($location) {
        return $location->parent;
    })->unique();

        return view('admin.directoryListings.location', compact('directoryListingLocations','parents'));

    }

    public function edit($id)
    {
        $directoryListingLocations = Location::with('parent')
            ->where('id','!=',$id)
            ->get();

        $parents = $directoryListingLocations->map(function ($location) {
return $location->parent;
})->unique();
        $location = Location::findOrFail($id);
        return view('admin.directoryListings.editLocation',compact('location','directoryListingLocations'));
    }
}
