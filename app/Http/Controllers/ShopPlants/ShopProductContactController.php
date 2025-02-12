<?php

namespace App\Http\Controllers\ShopPlants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopProductContactController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            // $SalePlants = SalePlants::all();

            return view('ShopPlants.Pages.ShopPlantsContact.index');


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
