<?php

namespace App\Http\Controllers\Front;

use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontAboutUsController extends Controller
{
    public function index()
    {
        // Retrieve the first row (assuming there is only one record)
        $aboutUs = AboutUs::first(); // or AboutUs::latest()->first() if you want the most recent entry

        // Decode the service titles and descriptions for both languages
        $serviceTitlesEn = $this->decodeJson($aboutUs->services_card_title_en);
        $serviceDescriptionsEn = $this->decodeJson($aboutUs->services_card_description_en);
        $serviceTitlesAr = $this->decodeJson($aboutUs->services_card_title_ar);
        $serviceDescriptionsAr = $this->decodeJson($aboutUs->services_card_description_ar);

        // Limit the arrays to the first 3 items
        $serviceTitlesEn = array_slice($serviceTitlesEn, 0, 3);
        $serviceDescriptionsEn = array_slice($serviceDescriptionsEn, 0, 3);
        $serviceTitlesAr = array_slice($serviceTitlesAr, 0, 3);
        $serviceDescriptionsAr = array_slice($serviceDescriptionsAr, 0, 3);

        // Pass the data to the view
        return view('front.about', compact('aboutUs', 'serviceTitlesEn', 'serviceDescriptionsEn', 'serviceTitlesAr', 'serviceDescriptionsAr'));
    }

    // Helper function to decode JSON and return an array (or empty array if invalid)
    private function decodeJson($json)
    {
        $decoded = json_decode($json, true);
        return is_array($decoded) ? $decoded : [];
    }
}
