<?php

namespace App\Http\Controllers\Api\v1\PlanningApplication;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanningApplication\PlanningApplicationResource;
use App\Models\PlanningApplication;
use Illuminate\Http\Request;

class PlanningApplicationController extends Controller
{
    public function index()
    {
        $planningApplications = PlanningApplication::with('images')->latest()->get();
        return PlanningApplicationResource::collection($planningApplications);
    }
}
