<?php

namespace App\Http\Controllers\Api\v1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('images')->latest()->get();
        return PostResource::collection($posts);
    }

    public function singlePost($slug)
    {
        $post = Post::with(['images','categories', 'comments' => function($query) {
            $query->where('status',1)->latest();
        }])->where('slug', $slug)->first();
        return new PostResource($post);
    }

    public function searchByTitle(Request $request)
    {
        $keyword = $request->keyword;
        $posts = Post::where('title','like','%'. $keyword. '%')->get();
        return PostResource::collection($posts);
    }
}
