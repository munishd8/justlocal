<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transport extends Model
{
    
     use HasFactory,SoftDeletes;

    protected $fillable = [
            'name',
            'description',
            'link',
    ];


            public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

        public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
