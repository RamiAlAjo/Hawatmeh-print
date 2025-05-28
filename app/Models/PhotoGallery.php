<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    // Define the table name if it's not the plural of the model name
    protected $table = 'photos_gallery';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'album_id',
        'album_images',
    ];


    // Specify the attributes that should be cast to native types
    protected $casts = [
        'album_images' => 'array',  // Store and retrieve album images as a JSON array
    ];

    // If using timestamps (created_at, updated_at)
    public $timestamps = true;

    public function album()
    {
        return $this->belongsTo(PhotoAlbum::class, 'album_id');
    }
}
