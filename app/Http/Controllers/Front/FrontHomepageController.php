<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageSlider;
use App\Models\AboutSection;
use App\Models\Client;
use App\Models\Product;
use App\Models\WebsiteSetting;  // ✅ Add this

class FrontHomepageController extends Controller
{
    public function index()
    {
        // Fetching the website settings
        $settings = WebsiteSetting::first();  // Fetch the first record from the website_settings table

        // Fetching other necessary data
        $sliders = HomepageSlider::all();
        $aboutsection = AboutSection::first();
        $clients = Client::all();
        $products = Product::all();

        // Passing the settings along with other data to the view
        return view('front.homepage', compact('settings', 'sliders', 'aboutsection', 'clients', 'products'));
    }
}
