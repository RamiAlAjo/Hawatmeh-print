<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageSlider;
use App\Models\AboutSection;
use App\Models\Client; // ✅ Add this
use App\Models\Product; // ✅ Add this

class FrontHomepageController extends Controller
{
    public function index()
    {
        $sliders = HomepageSlider::all();
        $aboutsection = AboutSection::first();
        $clients = Client::all(); // ✅ Fetch all clients
        $products = Product::all(); // ✅ Fetch all Product

        return view('front.homepage', compact('sliders', 'aboutsection', 'clients', 'products'));
    }

    //  public function search(Request $request)
    // {
    //     $query = $request->get('query'); // Get the search query
    //     $apartments = Apartment::where('title_en', 'like', '%' . $query . '%')
    //                            ->orWhere('location', 'like', '%' . $query . '%')
    //                            ->get();

    //     return view('front.homepage', compact('apartments'));
    // }
}
