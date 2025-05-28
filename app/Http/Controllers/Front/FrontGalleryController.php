<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;


class FrontGalleryController extends Controller
{
    public function index()
    {
        return view('front.gallery');
    }
}
