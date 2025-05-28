<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\VideoAlbum; // Model for albums
use App\Models\VideoGallery; // Model for videos
use Illuminate\Http\Request;

class FrontVideoAlbumController extends Controller
{
    // Show all albums (like a library)
    public function index()
    {
        // Fetch all video albums (not individual videos)
        $videoAlbums = VideoAlbum::all();

        return view('front.video_album', compact('videoAlbums'));
    }

    // Show all videos belonging to a single album
    public function show($albumId)
    {
        // Fetch the album by id
        $videoAlbum = VideoAlbum::findOrFail($albumId);

        // Fetch all videos that belong to this album
        $videos = VideoGallery::where('video_album_id', $albumId)->get();

        return view('front.video_gallery', compact('videoAlbum', 'videos'));
    }
}
