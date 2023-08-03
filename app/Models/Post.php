<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory,Sluggable,SoftDeletes;

    protected $fillable = [
            'title',
            'slug',
            'content',
            'excerpt',
            'category_id',
            'is_featured',
    ];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
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
}
