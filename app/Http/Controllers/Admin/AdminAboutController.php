<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
    // Show the About Us data
    public function index()
    {
        // Fetch the first (or only) About Us record from the database
        $aboutUs = AboutUs::first(); // Assuming there's only one "About Us" entry
        return view('admin.about.index', compact('aboutUs'));
    }

    // Show the form for creating the About Us page
    public function create()
    {
        return view('admin.about.create');
    }

    // Store a newly created About Us page in the database
   public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'about_us_description_en' => 'nullable|string',
        'about_us_description_ar' => 'nullable|string',
        'images' => 'nullable|array', // Multiple images (optional)
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Ensure all files are images

        // Goals Section
        'goals_main_title_en' => 'nullable|string',
        'goals_main_title_ar' => 'nullable|string',
        'goals_title_en' => 'nullable|string',
        'goals_description_en' => 'nullable|string',
        'goals_title_ar' => 'nullable|string',
        'goals_description_ar' => 'nullable|string',

        // Services Section
        // Limit the number of service cards to 3
        'services_card_title_en' => 'nullable|array|max:3',
        'services_card_title_en.*' => 'nullable|string|max:255',
        'services_card_description_en' => 'nullable|array|max:3',
        'services_card_description_en.*' => 'nullable|string|max:1000',

        'services_card_title_ar' => 'nullable|array|max:3',
        'services_card_title_ar.*' => 'nullable|string|max:255',
        'services_card_description_ar' => 'nullable|array|max:3',
        'services_card_description_ar.*' => 'nullable|string|max:1000',
    ]);

    // Handle multiple images upload
    $imagesPath = null;
    if ($request->hasFile('images')) {
        // Store each image and return an array of paths, then encode it as a JSON string
        $imagesPath = json_encode(array_map(function ($image) {
            return $image->store('about_us', 'public'); // Store image and return its path
        }, $request->file('images')));
    }

    // Handle the services card image upload (if any)
    $servicesCardImagePath = null;
    if ($request->hasFile('services_card_image')) {
        // Store the uploaded services card image and get its path
        $servicesCardImagePath = $request->file('services_card_image')->store('about_us', 'public');
    }

    // Create and store the About Us data in the database
    AboutUs::create([
        'about_us_description_en' => $request->input('about_us_description_en'),
        'about_us_description_ar' => $request->input('about_us_description_ar'),
        'images' => $imagesPath,
        'goals_main_title_en' => $request->input('goals_main_title_en'),
        'goals_main_title_ar' => $request->input('goals_main_title_ar'),
        'goals_title_en' => $request->input('goals_title_en'),
        'goals_description_en' => $request->input('goals_description_en'),
        'goals_title_ar' => $request->input('goals_title_ar'),
        'goals_description_ar' => $request->input('goals_description_ar'),

        // Store multiple services cards
        'services_card_title_en' => json_encode($request->input('services_card_title_en', [])),
        'services_card_description_en' => json_encode($request->input('services_card_description_en', [])),
        'services_card_title_ar' => json_encode($request->input('services_card_title_ar', [])),
        'services_card_description_ar' => json_encode($request->input('services_card_description_ar', [])),
    ]);

    // Redirect to the About Us page with a success message
    return redirect()->route('admin.about.index')->with('success', 'About Us page created successfully!');
}


    // Show the form for editing the About Us page
    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('admin.about.edit', compact('aboutUs'));
    }

    // Update the About Us page in the database
public function update(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'about_us_description_en' => 'nullable|string',
        'about_us_description_ar' => 'nullable|string',
        'images' => 'nullable|array',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'services_card_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'goals_main_title_en' => 'nullable|string',
        'goals_main_title_ar' => 'nullable|string',
        'goals_title_en' => 'nullable|string',
        'goals_description_en' => 'nullable|string',
        'goals_title_ar' => 'nullable|string',
        'goals_description_ar' => 'nullable|string',
        'services_card_title_en' => 'nullable|array|max:3',
        'services_card_description_en' => 'nullable|array|max:3',
        'services_card_title_ar' => 'nullable|array|max:3',
        'services_card_description_ar' => 'nullable|array|max:3',
    ]);

    // Find the About Us entry by ID
    $aboutUs = AboutUs::findOrFail($id);

    // Handle multiple images upload (if provided)
    $images = json_decode($aboutUs->images, true) ?? [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $images[] = $image->store('about_us', 'public');
        }
    }

    // Handle services card image upload (if provided)
    if ($request->hasFile('services_card_image')) {
        // Delete old services card image if exists
        if ($aboutUs->services_card_image) {
            Storage::disk('public')->delete($aboutUs->services_card_image);
        }
        $servicesCardImagePath = $request->file('services_card_image')->store('about_us', 'public');
    } else {
        // Keep the existing services card image if no new one is uploaded
        $servicesCardImagePath = $aboutUs->services_card_image;
    }

    // Update the About Us entry
    $aboutUs->update([
        'about_us_description_en' => $request->input('about_us_description_en'),
        'about_us_description_ar' => $request->input('about_us_description_ar'),
        'images' => json_encode($images), // Store the updated images array
        'goals_main_title_en' => $request->input('goals_main_title_en'),
        'goals_main_title_ar' => $request->input('goals_main_title_ar'),
        'goals_title_en' => $request->input('goals_title_en'),
        'goals_description_en' => $request->input('goals_description_en'),
        'goals_title_ar' => $request->input('goals_title_ar'),
        'goals_description_ar' => $request->input('goals_description_ar'),
        'services_card_image' => $servicesCardImagePath, // Update services card image path
        'services_card_title_en' => json_encode($request->input('services_card_title_en', [])),
        'services_card_description_en' => json_encode($request->input('services_card_description_en', [])),
        'services_card_title_ar' => json_encode($request->input('services_card_title_ar', [])),
        'services_card_description_ar' => json_encode($request->input('services_card_description_ar', [])),
    ]);

    return redirect()->route('admin.about.index')->with('status-success', 'About Us page updated successfully!');
}


    // Remove the specified About Us data from the database
    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);

        // Delete images if they exist
        $images = json_decode($aboutUs->images, true);
        if ($images) {
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        // Delete services card image if it exists
        if ($aboutUs->services_card_image) {
            Storage::disk('public')->delete($aboutUs->services_card_image);
        }

        // Delete the About Us entry
        $aboutUs->delete();

        return redirect()->route('admin.about.index')->with('status-success', 'About Us data deleted successfully!');
    }
}
