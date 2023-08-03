<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeathNotice extends Model
{
        use HasFactory,Sluggable,SoftDeletes;

    protected $fillable = [
            'title',
            'slug',
            'content',
            'date_of_birth',
            'date_of_death',
            'notice_date',
            'notice_link',
            'link',
    ];

    public $casts = [
        'date_of_birth'     => 'immutable_date',
        'date_of_death' => 'immutable_datetime',
        'notice_date' => 'immutable_datetime',
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
