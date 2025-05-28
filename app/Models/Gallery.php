<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'gallery';

    // The attributes that are mass assignable
    protected $fillable = [
        'gallery_title_en',
        'gallery_title_ar',
        'gallery_image',
        'gallery_images',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'gallery_images' => 'array',  // Cast the gallery_images field as an array
    ];

    // The timestamps are enabled by default in Laravel, but you can disable them if necessary
    public $timestamps = true;

    // Optional: You can define any relationships here if needed in the future
    // For example, if you have another model like `Image`, you can add a relationship method here
    // public function images()
    // {
    //     return $this->hasMany(Image::class);
    // }
}
