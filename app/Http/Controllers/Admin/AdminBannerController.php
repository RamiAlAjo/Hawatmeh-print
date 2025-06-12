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
    // Validate the incoming data
    $validatedData = $request->validate([
        'title_en' => 'required|string|max:255',
        'title_ar' => 'nullable|string|max:255',
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
        'title_en' => $validatedData['title_en'],
        'title_ar' => $validatedData['title_ar'] ?? null,
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
