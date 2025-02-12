<?php

namespace App\Http\Controllers\ShopPlants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopPlantsController extends Controller
{
    public function Index()
    {
        try {
            // Fetch blogs with their related images


            return view('ShopPlants.Pages.Home.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
