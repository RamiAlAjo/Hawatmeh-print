<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class FrontContactController extends Controller
{
    public function index()
    {
        $settings = WebsiteSetting::first(); // Fetch the settings (assumes only 1 row)

        return view('front.contact_us', compact('settings'));
    }
}
