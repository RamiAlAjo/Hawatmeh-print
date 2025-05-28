<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    // Display a listing of the gallery
    public function index()
    {
        // Fetch all galleries from the database
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    // Show the form for creating a new gallery
    public function create()
    {
        return view('admin.gallery.create');
    }

    // Store a newly created gallery in the database
    public function store(Request $request)
    {
        $request->validate([
            'gallery_title_en' => 'required|string|max:255',
            'gallery_title_ar' => 'required|string|max:255',
            'gallery_image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        // Handle the single image upload
        $gallery_image = null;
        if ($request->hasFile('gallery_image')) {
            $gallery_image = $request->file('gallery_image')->store('gallery_images', 'public');
        }

        // Create a new gallery record
        Gallery::create([
            'gallery_title_en' => $request->gallery_title_en,
            'gallery_title_ar' => $request->gallery_title_ar,
            'gallery_image' => $gallery_image,
        ]);

        return redirect()->route('admin.gallery.index')->with('status-success', 'Gallery created successfully!');
    }

    // Show the form for editing the specified gallery
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    // Update the specified gallery in the database
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'gallery_title_en' => 'required|string|max:255',
            'gallery_title_ar' => 'required|string|max:255',
            'gallery_image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('gallery_image')) {
            // Delete old image from storage if it exists
            if ($gallery->gallery_image) {
                Storage::disk('public')->delete($gallery->gallery_image);
            }
            $gallery->gallery_image = $request->file('gallery_image')->store('gallery_images', 'public');
        }

        // Update gallery record
        $gallery->update([
            'gallery_title_en' => $request->gallery_title_en,
            'gallery_title_ar' => $request->gallery_title_ar,
        ]);

        return redirect()->route('admin.gallery.index')->with('status-success', 'Gallery updated successfully!');
    }

    // Remove the specified gallery from the database
    public function destroy(Gallery $gallery)
    {
        // Delete single image
        if ($gallery->gallery_image) {
            Storage::disk('public')->delete($gallery->gallery_image);
        }

        // Delete the gallery from the database
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('status-success', 'Gallery deleted successfully!');
    }
}
