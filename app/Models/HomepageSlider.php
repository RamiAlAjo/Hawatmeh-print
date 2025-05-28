<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSlider extends Model
{
    use HasFactory;

    protected $table = 'homepage_slider';  // The name of the table

    protected $fillable = [
        'title_en',
        'title_ar',
        'image',
        'url'
    ];
}
