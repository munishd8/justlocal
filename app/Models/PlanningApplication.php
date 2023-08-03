<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanningApplication extends Model
{
     use HasFactory,SoftDeletes;

    protected $fillable = [
            'name',
            'details',
            'applicant_name',
            'planning_reference',
            'registration_date',
            'due_submit_date',

    ];

    public $casts = [
        'registration_date' => 'immutable_date',
        'due_submit_date' => 'immutable_date',
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
