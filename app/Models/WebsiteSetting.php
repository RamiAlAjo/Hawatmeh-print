<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $table = "website_settings";

    // Fields to be mass-assigned
    protected $fillable = [
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'phone',
        'email',
        'logo',
        'address',
        'url',
        'location',
    ];
}
