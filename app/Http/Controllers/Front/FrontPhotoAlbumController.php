<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PhotoAlbum; // Correct model
use Illuminate\Http\Request;
use App\Models\PhotoGallery;

class FrontPhotoAlbumController extends Controller
{
    public function index()
    {
        // Fetch all albums
        $photoGalleries = PhotoAlbum::all();

        // Return the view and pass the data
        return view('front.photo_album', compact('photoGalleries'));
    }


    public function show($id)
    {
        // Get album info
        $album = PhotoAlbum::findOrFail($id);

        // Get photos for this album
        $photoGalleries = PhotoGallery::where('album_id', $id)->get();

        return view('front.photo_gallery', compact('photoGalleries', 'album'));
    }
}
