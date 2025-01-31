<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\AyurvedaGuide;
use Illuminate\Http\Request;

class CustomerAyurvedicGuideController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $ayurveda_guides = AyurvedaGuide::all();

            return view('PublicArea.Pages.AyurvedicGuides.index', compact('ayurveda_guides'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
