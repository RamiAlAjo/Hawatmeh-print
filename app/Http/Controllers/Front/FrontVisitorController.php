<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\VisitorCount;

class FrontVisitorController extends Controller
{
    public function incrementVisitorCount()
    {
        $visitorCount = VisitorCount::firstOrNew([]);
        $visitorCount->count += 1;
        $visitorCount->save();

        return response()->json(['count' => $visitorCount->count]);
    }

    public function getVisitorCount()
    {
        $visitorCount = VisitorCount::firstOrNew([]);
        return response()->json(['count' => $visitorCount->count]);
    }

}
