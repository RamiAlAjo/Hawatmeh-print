<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the banners.
     */
    public function index()
    {
        $banners = Banner::all(); // Fetch all banners
        return view('admin.banner.index', compact('banners')); // Pass to view
    }

    /**
     * Show the form for creating a new banner.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created banner in storage.
     */
    public function store(Request $request)
    {
        // Check if there's already an existing banner
        $existingBanner = Banner::first();
        if ($existingBanner) {
            return redirect()->route('admin.banner.index')->with('status-error', 'A banner already exists. You cannot create more than one.');
        }

        // Validate the incoming data (only image is required now)
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6048',
        ]);

        // Check if the request has a file to upload
        $imagePath = null;

        if ($request->hasFile('image')) {
            $bannersImageUploadPath = 'uploads/banners/image/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $bannersImageFilename = time() . '.' . $ext;
            $file->move($bannersImageUploadPath, $bannersImageFilename);
            $imagePath = $bannersImageUploadPath . $bannersImageFilename;
        }

        // Create the banner in the database
        Banner::create([
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner added successfully.');
    }

    /**
     * Show the form for editing the specified banner.
     */
    public function edit($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('status-error', 'Banner not found.');
        }

        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified banner in storage.
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('status-error', 'Banner not found.');
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $bannersImageUploadPath = 'uploads/banners/image/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $bannersImageFilename = time() . '.' . $ext;
            $file->move($bannersImageUploadPath, $bannersImageFilename);
            $banner->image = $bannersImageUploadPath . $bannersImageFilename;
        }

        $banner->save();

        return redirect()->route('admin.banner.index')->with('status-success', 'Banner updated successfully!');
    }

    /**
     * Remove the specified banner from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('status-error', 'Banner not found.');
        }

        // Remove image file from the server
        if (Storage::exists($banner->image)) {
            Storage::delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('status-success', 'Banner deleted successfully!');
    }
}
