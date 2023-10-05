<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
// use App\Models\Comment;
// use App\Models\Post;
// use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comments()
    {
        // $comments = Comment::with('commentable')->latest()->get();
        // $postWithComments = Post::with('comments')->where('id',$id)->first();
        return view('admin.comments.comments');
    }
}
