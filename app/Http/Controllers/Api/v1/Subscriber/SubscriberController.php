<?php

namespace App\Http\Controllers\Api\v1\Subscriber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        return auth()->user();
    }
}
