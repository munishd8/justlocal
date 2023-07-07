<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Category extends Model
{
    use HasFactory,Sluggable;

     protected $fillable = [
        'name',
        'slug',
        'parent_category',
        'description',
        'menu_id',
        'image',
    ];

 public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

        public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_category');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_category');
    }

        public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
