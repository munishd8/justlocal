<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ContactInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'directory_listing_id',
        'hide_contact',
        'zip_code',
        'fax',
        'email',
        'website',
        'contact_excerpt',
        'contact_info_content',
    ];

    public function directoryListing(): BelongsTo
    {
        return $this->belongsTo(DirectoryListing::class);
    }

    public function contactNumbers():BelongsToMany
    {
        return $this->BelongsToMany(PhoneType::class)
            ->withPivot(['phone_number']);
    }
    
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
