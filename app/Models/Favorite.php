<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','favoriteable'];

    public function favoriteable(): MorphTo
    {
        return $this->morphTo();
    }

    public function posts():MorphToMany
    {
        return $this->morphedByMany(Post::class, 'favoriteable');
    }
}
