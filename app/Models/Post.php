<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Post extends Model
{
    use HasFactory,Sluggable;

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
}
