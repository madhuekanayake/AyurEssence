<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\HerbalGarden;
use Illuminate\Http\Request;

class CustomerLocationsController extends Controller
{
    public function HerbalGardensAll()
    {
        try {
            // Fetch all gallery data
            $herbal_gardens = HerbalGarden::all();

            return view('PublicArea.Pages.Locations.herbalGardens', compact('herbal_gardens'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
