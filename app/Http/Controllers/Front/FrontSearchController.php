<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Import Product Model

class FrontSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search in English & Arabic titles
        $products = Product::where('title_en', 'LIKE', "%{$query}%")
            ->orWhere('title_ar', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($products); // Return JSON response
    }

    public function searchResults(Request $request)
{
    $query = $request->input('query');

    // Search in English & Arabic titles
    $products = Product::where('title_en', 'LIKE', "%{$query}%")
        ->orWhere('title_ar', 'LIKE', "%{$query}%")
        ->paginate(20); // paginate results for easier navigation

        return view('front.search_results', compact('products', 'query'));
    }

}
