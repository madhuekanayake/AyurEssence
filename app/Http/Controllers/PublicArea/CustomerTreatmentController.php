<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class CustomerTreatmentController extends Controller
{
    public function All()
    {
        try {
            // Fetch blogs with their related images
            $treatments = Treatment::with('images')->get();

            return view('PublicArea.Pages.Treatments.index', compact('treatments'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            // Fetch the blog with the given ID, including associated images
            $treatment = Treatment::with('images')->findOrFail($id);
            // $treatments = Treatment::findOrFail($id);


            return view('PublicArea.Pages.Treatments.treatmentsDetails', compact('treatment'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
