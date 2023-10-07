<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class Post extends Model
{
    use HasFactory,Sluggable,SoftDeletes;

    protected $fillable = [
            'title',
            'slug',
            'content',
            'excerpt',
            'link',
            'category_id',
            'is_featured',
    ];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'includeTrashed' => true,
            ]
        ];
    }

            public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

        public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }

}