<?php

namespace App\Http\Controllers\Api\v1\LocalEat;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocalEat\LocalEatResource;
use App\Models\LocalEat;
use Illuminate\Http\Request;

class LocalEatController extends Controller
{
    public function index()
    {
        $localEats = LocalEat::with('images')->latest()->get();
        return LocalEatResource::collection($localEats);
    }
}
