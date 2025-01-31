<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\ConservationAwareness;
use Illuminate\Http\Request;

class CustomerConservationAndAwarenessController extends Controller
{
    public function All()
    {
        try {
            // Fetch blogs with their related images
            $conservation_awarenesses = ConservationAwareness::all();

            return view('PublicArea.Pages.ConservationAndAwareness.index', compact('conservation_awarenesses'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            // Fetch the blog with the given ID, including associated images
            $conservation_awarenesses = ConservationAwareness::findOrFail($id);

            return view('PublicArea.Pages.ConservationAndAwareness.conservationAndawarenesses', compact('conservation_awarenesses'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
