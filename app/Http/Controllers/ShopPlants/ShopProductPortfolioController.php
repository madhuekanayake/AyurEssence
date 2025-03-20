<?php

namespace App\Http\Controllers\ShopPlants;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class ShopProductPortfolioController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $portfolios = Portfolio::all();

            return view('ShopPlants.Pages.ShopPlantsPortfolio.index', compact('portfolios'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
