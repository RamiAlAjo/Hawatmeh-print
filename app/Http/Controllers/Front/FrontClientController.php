<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class FrontClientController extends Controller
{
    public function index()
    {
        // Fetch all clients from the database
        $clients = Client::all();

        // Pass the data to the view
        return view('front.clients', compact('clients'));
    }
}
