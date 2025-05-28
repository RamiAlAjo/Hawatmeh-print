<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;

    protected $table = 'video_gallery';


    protected $fillable = [
        'video_album_id',
        'video_title_en',
        'video_title_ar',
        'video_thumbnail',
        'youtube_links',
    ];


    public function album()
    {
        return $this->belongsTo(VideoAlbum::class, 'video_album_id');
    }
}
