<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class FrontPortfolioController extends Controller
{
      public function index()
    {

        // In PortfolioController or similar
        $portfolios = Portfolio::all();

        // Return the view with the apartments data
        return view('front.portfolio', compact('portfolios'));
    }
}
