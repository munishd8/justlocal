<?php

namespace App\Http\Controllers\Api\v1\Subscriber;

use App\Http\Controllers\Controller;
use App\Http\Requests\favoritePostsRequest;
use App\Http\Resources\favoritePostsResource;
use App\Models\Favorite;
use App\Models\Post;

class SubscriberController extends Controller
{
    public function index()
    {
        return auth()->user();
    }

    public function favoritePosts()
    {
        return favoritePostsResource::collection(auth()->user()->favoritePosts());
    }
    
public function addFavoritePosts(favoritePostsRequest $request)
{
$post = Post::find($request->id);
$FavoriteModel = new Favorite();
$FavoriteModel->user_id = auth()->id();
$post->favorites()->save($FavoriteModel);

return response()->json([
    'message' => 'Post Successfully added to favorite.'
]);

}

public function removeFromFavoritePosts($id)
{
    Favorite::findOrFail($id)
        ->delete();
 
return response()->json([
    'message' => 'Post Successfully removed from favorite.'
]);

}




}
