<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlanttUsController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $plantS = Plant::all();

            return view('PublicArea.Pages.plant.index', compact('plantS'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
