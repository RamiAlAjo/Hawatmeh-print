<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'about_us';

    // The attributes that are mass assignable
    protected $fillable = [
        'about_us_description_en',
        'about_us_description_ar',
        'goals_main_title_en',
        'goals_main_title_ar',
        'goals_title_en',
        'goals_description_en',
        'goals_title_ar',
        'goals_description_ar',
        'services_card_image',
        'services_card_title_en',
        'services_card_description_en',
        'services_card_title_ar',
        'services_card_description_ar',
        'images', // This can be stored as a JSON field
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'images' => 'array', // This ensures that the 'images' attribute is cast to an array when retrieved
    ];

    // Optionally, if you need to set custom dates
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
