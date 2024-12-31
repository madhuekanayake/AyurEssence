<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\AyurvedaGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EducationalContentController extends Controller
{
    public function AyurvedaGuideAll()
{
    try {
        // Fetch all gallery data
        $ayurveda_guides = AyurvedaGuide::all();

        return view('AdminArea.Pages.EducationalContent.ayurvedaGuide', compact('ayurveda_guides'));


    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function AyurvedaGuideAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'title' => 'required|string|max:255|unique:ayurveda_guides,title', // Ensure title is unique
        'information' => 'required|string|max:1000', // Information is required
        'description' => 'required|string|max:500', // Description is required
    ], [
        'title.unique' => 'The title must be unique. Please choose another title.',
    ]);

    try {
        $data = $request->all();

        // Generate a unique guide ID
        $data['ayurvedaGuideId'] = 'GUIDE' . Str::random(6); // Random 6-character string with prefix

        // Save guide data
        AyurvedaGuide::create($data);

        return back()->with('success', 'Ayurvedic Guide added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

}
