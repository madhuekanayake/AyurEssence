<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\PlantDiseases;
use Illuminate\Http\Request;

class CustomerPlanttUsController extends Controller
{
    public function All()
    {
        try {
            // Fetch blogs with their related images
            $plants = Plant::with('images')->get();

            return view('PublicArea.Pages.plant.index', compact('plants'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function Search (Request $request)
    {
        try {
        //     // Fetch all doctors or filter by search query
            $search = $request->query('search');

            $plants = Plant::when($search, function ($query, $search) {
                return $query->where('plantname', 'like', '%' . $search . '%');
            })->get();

            return view('PublicArea.Pages.plant.index', compact('plants'));

        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }


    public function show($id)
    {
        try {
            // Fetch the blog with the given ID, including associated images
            $plant = Plant::with('images')->findOrFail($id);

            return view('PublicArea.Pages.plant.plantsDetails', compact('plant'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
   }


   public function PlantDiseasesAll()
{
    try {
        // Fetch all gallery data
        $plant_diseases = PlantDiseases::with('images')->get();

        return view('PublicArea.Pages.PlantDiseases.index', compact('plant_diseases'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}


public function showPlantDiseases($id)
{
    try {
        // Fetch the blog with the given ID, including associated images
        $plant_diseases = PlantDiseases::with('images')->findOrFail($id);

        return view('PublicArea.Pages.PlantDiseases.plantsDiseasesDetails', compact('plant_diseases'));
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}
}
