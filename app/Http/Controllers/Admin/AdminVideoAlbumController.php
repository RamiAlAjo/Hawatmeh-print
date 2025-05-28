<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVideoAlbumController extends Controller
{
    // Show a list of all video albums
    public function index()
    {
        $albums = VideoAlbum::all();
        return view('admin.video_album.index', compact('albums'));
    }

    // Show the form to create a new video album
    public function create()
    {
        return view('admin.video_album.create');
    }

    // Store a newly created video album in storage
    public function store(Request $request)
    {
        $request->validate([
            'album_title_en' => 'required|string|max:255',
            'album_title_ar' => 'nullable|string|max:255',
            'album_cover'    => 'nullable|image|max:2048', // max 2MB
        ]);

        $coverPath = null;

        if ($request->hasFile('album_cover')) {
            $coverPath = $request->file('album_cover')->store('video_album_covers', 'public');
        }

        VideoAlbum::create([
            'album_title_en' => $request->album_title_en,
            'album_title_ar' => $request->album_title_ar,
            'album_cover'    => $coverPath,
        ]);

        return redirect()->route('admin.video-album.index')->with('status-success', 'Video album created successfully.');
    }

    // Show the form to edit an existing video album
    public function edit($id)
    {
        $album = VideoAlbum::findOrFail($id);
        return view('admin.video_album.edit', compact('album'));
    }

    // Update the specified video album
    public function update(Request $request, $id)
    {
        $album = VideoAlbum::findOrFail($id);

        $request->validate([
            'album_title_en' => 'required|string|max:255',
            'album_title_ar' => 'nullable|string|max:255',
            'album_cover'    => 'nullable|image|max:2048',
        ]);

        $coverPath = $album->album_cover;

        if ($request->hasFile('album_cover')) {
            // Delete old cover image if it exists
            if ($coverPath && Storage::disk('public')->exists($coverPath)) {
                Storage::disk('public')->delete($coverPath);
            }

            // Store new image
            $coverPath = $request->file('album_cover')->store('video_album_covers', 'public');
        }

        $album->update([
            'album_title_en' => $request->album_title_en,
            'album_title_ar' => $request->album_title_ar,
            'album_cover'    => $coverPath,
        ]);

        return redirect()->route('admin.video-album.index')->with('status-success', 'Video album updated successfully.');
    }

    // Delete the specified video album
    public function destroy($id)
    {
        $album = VideoAlbum::findOrFail($id);

        // Delete album cover image if it exists
        if ($album->album_cover && Storage::disk('public')->exists($album->album_cover)) {
            Storage::disk('public')->delete($album->album_cover);
        }

        // Delete the album
        $album->delete();

        return redirect()->route('admin.video-album.index')->with('status-success', 'Video album deleted successfully.');
    }
}
