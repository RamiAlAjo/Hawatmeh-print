<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoAlbum extends Model
{
    use HasFactory;

    protected $table = 'video_album';

    // ✅ Allow mass assignment on these fields
    protected $fillable = [
        'album_title_en',
        'album_title_ar',
        'album_cover',
    ];

    public function videos()
    {
        return $this->hasMany(VideoGallery::class, 'video_album_id');
    }
}
