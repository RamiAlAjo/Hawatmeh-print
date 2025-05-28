<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    // Show a list of all products
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('admin.products.create');
    }

    // Store a newly created product in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title_en' => 'required|string|max:255', // Title in English
            'description_en' => 'required|string', // Description in English
            'title_ar' => 'required|string|max:255', // Title in Arabic
            'description_ar' => 'required|string', // Description in Arabic
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Single image (optional)
            'images' => 'nullable|array', // Multiple images (optional)
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Ensure all files are images
            // Validate features and benefits (they should be arrays)
            'features_en' => 'nullable|array', // Features in English (optional array)
            'features_en.*' => 'nullable|string', // Each feature should be a string
            'features_ar' => 'nullable|array', // Features in Arabic (optional array)
            'features_ar.*' => 'nullable|string', // Each feature should be a string
            'benefits_en' => 'nullable|array', // Benefits in English (optional array)
            'benefits_en.*' => 'nullable|string', // Each benefit should be a string
            'benefits_ar' => 'nullable|array', // Benefits in Arabic (optional array)
            'benefits_ar.*' => 'nullable|string', // Each benefit should be a string
        ]);

        // Handle single image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store the uploaded single image and get its path
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Handle multiple images upload
        $imagesPath = null;
        if ($request->hasFile('images')) {
            // Store each image and return an array of paths, then encode it as a JSON string
            $imagesPath = json_encode(array_map(function ($image) {
                return $image->store('products', 'public'); // Store image and return its path
            }, $request->file('images')));
        }

        // Create and store the new product in the database
        $product = Product::create([
            'title_en' => $request->input('title_en'), // Title in English
            'description_en' => $request->input('description_en'), // Description in English
            'title_ar' => $request->input('title_ar'), // Title in Arabic
            'description_ar' => $request->input('description_ar'), // Description in Arabic
            'image' => $imagePath, // Path of the single image
            'images' => $imagesPath, // JSON string of multiple image paths
            // Convert features from array to JSON before saving
            'features_en' => $request->has('features_en') ? json_encode($request->input('features_en')) : null, // Features in English (converted to JSON)
            'features_ar' => $request->has('features_ar') ? json_encode($request->input('features_ar')) : null, // Features in Arabic (converted to JSON)
            // Convert benefits from array to JSON before saving
            'benefits_en' => $request->has('benefits_en') ? json_encode($request->input('benefits_en')) : null, // Benefits in English (converted to JSON)
            'benefits_ar' => $request->has('benefits_ar') ? json_encode($request->input('benefits_ar')) : null, // Benefits in Arabic (converted to JSON)
        ]);

        // Redirect to the product index page with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }




    // Show the form for editing the specified product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update the specified product in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'title_en' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'features_en' => 'nullable|array',
            'benefits_en' => 'nullable|array',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Handle the image upload for the main image (if provided)
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image; // Keep the old image if no new one is uploaded
        }

        // Handle multiple images upload (if provided)
        $images = json_decode($product->images, true) ?? []; // Ensure it's an array even if null
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('products', 'public');
            }
        }

        // Update the product
        $product->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,  // Ensure title_ar is also handled
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,  // Ensure description_ar is also handled
            'image' => $imagePath,
            'images' => json_encode($images),  // Save images as a JSON-encoded array
            'features_en' => json_encode($request->features_en ?? []), // Ensure features are saved as JSON
            'features_ar' => json_encode($request->features_ar ?? []), // Ensure features are saved as JSON
            'benefits_en' => json_encode($request->benefits_en ?? []), // Ensure benefits are saved as JSON
            'benefits_ar' => json_encode($request->benefits_ar ?? []), // Ensure benefits are saved as JSON
        ]);

        return redirect()->route('admin.products.index')->with('status-success', 'Product updated successfully!');
    }


    // Remove the specified product from the database
    public function destroy($id)
    {
        // Find the product
        $product = Product::findOrFail($id);

        // Delete the main image if it exists
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        // Delete the product images if they exist
        $images = json_decode($product->images, true);
        if ($images) {
            foreach ($images as $image) {
                \Storage::disk('public')->delete($image);
            }
        }

        // Delete the product
        $product->delete();

        return redirect()->route('admin.products.index')->with('status-success', 'Product deleted successfully!');
    }
}
