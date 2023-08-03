<?php

namespace App\Http\Controllers\Admin\DirectoryListings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Location;

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
        $directoryListingCategories = Category::with('parent')->where('menu_id',3)->get();
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
        //
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
}
