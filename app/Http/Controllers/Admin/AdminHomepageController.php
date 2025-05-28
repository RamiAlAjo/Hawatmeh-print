<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;

class AdminHomepageController extends Controller
{
    public function index()
    {
        // Get the logged-in user using Auth
        $user = Auth::user();

        // Fetch statistical information
        $totalProducts = Product::count();
        $totalGalleryItems = Gallery::count();
        $totalPhotoGalleryItems = PhotoGallery::count();
        $totalVideoGalleryItems = VideoGallery::count();

        // Fetch recent activities (e.g., recent users, recent products)
        $recentUsers = User::latest()->take(5)->get();
        $recentProducts = Product::latest()->take(5)->get();
        $recentGalleryItems = Gallery::latest()->take(5)->get();
        $recentPhotoGalleryItems = PhotoGallery::latest()->take(5)->get();
        $recentVideoGalleryItems = VideoGallery::latest()->take(5)->get();

        // Pass the user and statistical data to the view
        return view('admin.homepage', compact(
            'user',
            'totalProducts',
            'totalGalleryItems',
            'totalPhotoGalleryItems',
            'totalVideoGalleryItems',
            'recentUsers',
            'recentProducts',
            'recentGalleryItems',
            'recentPhotoGalleryItems',
            'recentVideoGalleryItems'
        ));
    }
}
