<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontProductController extends Controller
{
    public function index()
    {

        // Retrieve all products from the database
        $products = Product::all();


        return view('front.product', compact('products'));
    }

    public function show($id) // You can pass the product ID here if needed
    {
        // Fetch the product by ID
        $product = Product::findOrFail($id);

        // Pass the product data to the view
        return view('front.product_description', compact('product'));
    }
}
