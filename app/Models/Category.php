<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory,Sluggable;

     protected $fillable = [
        'name',
        'slug',
        'parent_category',
        'description',
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
}
