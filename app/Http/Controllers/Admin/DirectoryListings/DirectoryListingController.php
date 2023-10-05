<?php

namespace App\Http\Controllers\Admin\DirectoryListings;

use App\Exports\ContactInformationsExport;
use App\Exports\DirectoryListingsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\DirectoryListing;
use App\Models\Location;
use Maatwebsite\Excel\Excel;

class DirectoryListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.directoryListings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directoryListingLocations = Location::with('parent')->get();
        $directoryListingCategories = Category::with('parent')->where('menu_id', 3)->get();
        return view('admin.directoryListings.create', [
            'directoryListingCategories' => $directoryListingCategories,
            'directoryListingLocations' => $directoryListingLocations,
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
    public function edit(string $id)
    {
        $directoryListingLocations = Location::locationTree();
        $directoryListing = DirectoryListing::with(['categories', 'locations', 'contactInformation', 'images'])
            ->find($id);
        // return $directoryListing->contactInformation->contactNumbers;
        // $directoryListingCategories = Category::with('parent')->where('menu_id', 3)->get();
        $directoryListingCategories = Category::directoryListingCategorytree();
        return view('admin.directoryListings.edit', compact('directoryListing', 'directoryListingCategories', 'directoryListingLocations'));
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

    public function trash(): View
    {
        return view('admin.directoryListings.trash');
    }

    public function export()
    {
        return (new DirectoryListingsExport)->download('directory-listings.csv', Excel::CSV, ['Content-Type' => 'text/csv']);

    }
    public function contactInformationExport()
    {
        return (new ContactInformationsExport)->download('contact-information.csv', Excel::CSV, ['Content-Type' => 'text/csv']);

    }
    
}
