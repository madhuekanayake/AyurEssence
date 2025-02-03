<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\AyurvedicHospital;
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

    public function AyurvedicHospitalsAll()
    {
        try {
            // Fetch all gallery data
            $ayurvedic_hospitals = AyurvedicHospital::all();

            return view('PublicArea.Pages.Locations.ayurvedicHospitals', compact('ayurvedic_hospitals'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function LocalPharmaciesAll()
    {
        try {
            // Fetch all gallery data
            $local_pharmacies = AyurvedicHospital::all();

            return view('PublicArea.Pages.Locations.localPharmacies', compact('local_pharmacies'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            // Fetch the blog with the given ID, including associated images
            $ayurvedic_hospitals = AyurvedicHospital::with('images')->findOrFail($id);

            return view('PublicArea.Pages.Locations.ayurvedicHospitalsDetails', compact('ayurvedic_hospitals'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }


    public function HerbalGardensShow($id)
    {
        try {
            // Fetch the blog with the given ID, including associated images
            $garden = HerbalGarden::with('images')->findOrFail($id);

            return view('PublicArea.Pages.Locations.herbalGardensDetails', compact('garden'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
