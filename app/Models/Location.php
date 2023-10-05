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
                'source' => 'name',
                'includeTrashed' => true,
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

    public static function locationTree()
    {
        $allLocations = Location::get();
        $locations = $allLocations->whereNull('parent_location');

        self::formatTree($locations, $allLocations);
        return $locations;
    }

    private static function formatTree($locations, $allLocations)
    {
        foreach ($locations as $location) {
            $location->children = $allLocations->where('parent_location', $location->id)->values();

            if ($location->children->isNotEmpty()) {
                self::formatTree($location->children, $allLocations);
            }
        }
    }
}

