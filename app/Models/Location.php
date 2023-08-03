<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory,Sluggable, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'parent_location',
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
        return $this->belongsTo(Location::class, 'parent_location');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Location::class, 'parent_location');
    }

    public function directoryListings(): BelongsToMany
    {
        return $this->belongsToMany(DirectoryListing::class);
    }
}
