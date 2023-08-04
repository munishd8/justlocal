<?php

namespace App\Http\Controllers\Api\v1\Transports;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transports\TransportResource;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::with('images')->latest()->get();
        return TransportResource::collection($transports);
    }
}
