<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Plant;
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
}
