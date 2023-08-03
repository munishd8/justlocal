<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PhoneType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name',
    ];

    public function contactNumbers(): BelongsToMany
    {
        return $this->belongsToMany(ContactInformation::class)
            ->withPivot(['phone_number']);
    }

}
