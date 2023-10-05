<?php

namespace App\Http\Controllers\Api\v1\DeathNotice;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeathNotice\DeathNoticeResource;
use App\Models\DeathNotice;
use Illuminate\Http\Request;

class DeathNoticeController extends Controller
{
    public function index()
    {
        $deathNotices = DeathNotice::with('images')->latest()->get();
        return DeathNoticeResource::collection($deathNotices);
    }
}
