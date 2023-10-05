<?php

namespace App\Http\Controllers\Api\v1\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Services\UserService;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    public $user_id;

    public function __construct(UserService $userService)
    {
        $this->user_id = $userService->CheckUserToken();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $comment  = Post::find($request->id);

        if ($this->user_id) {
            $user = User::where('id', $this->user_id)->first(); 
            $comment->comments()->create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'content' => $request->content,
            ]);
        } else {

            $comment->comments()->create([
                'name' => $request->name,
                'email' => $request->email,
                'content' => $request->content,
            ]);
        }

        return response()->json([
            'message' => 'Comment Successfully Addedd.',
        ]);

    }

}
