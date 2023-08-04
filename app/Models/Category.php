<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory,Sluggable, SoftDeletes;

     protected $fillable = [
        'id',
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

    public static function postCategorytree()
    {
        $allPostCategories = Category::where('menu_id', 1)->get();
        $postCategories = $allPostCategories->whereNull('parent_category');

        self::formatTree($postCategories, $allPostCategories);
        return $postCategories;
    }

    public static function directoryListingCategorytree()
    {
        $allDirectoryListingCategories = Category::where('menu_id', 3)->get();
        $directoryListingCategories = $allDirectoryListingCategories->whereNull('parent_category');

        self::formatTree($directoryListingCategories, $allDirectoryListingCategories);
        return $directoryListingCategories;
    }

    private static function formatTree($categories, $allCategories)
    {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_category', $category->id)->values();

            if ($category->children->isNotEmpty()) {
                self::formatTree($category->children, $allCategories);
            }
        }
    }
}