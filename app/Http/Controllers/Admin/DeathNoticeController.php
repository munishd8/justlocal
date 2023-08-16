<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeathNotice;
use Illuminate\Http\Request;

class DeathNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.deathNotices.death-notices');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.deathNotices.create');
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
        $deathNotice =  DeathNotice::findOrFail($id);
        return view('admin.deathNotices.edit',compact('deathNotice'));
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
        
        return view('admin.deathNotices.trash');
    }
}
