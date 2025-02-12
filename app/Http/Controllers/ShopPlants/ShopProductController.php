<?php

namespace App\Http\Controllers\ShopPlants;

use App\Http\Controllers\Controller;
use App\Models\SalePlantImage;
use App\Models\SalePlants;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $SalePlants = SalePlants::all();

            return view('ShopPlants.Pages.ShopProducts.index', compact('SalePlants'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function show($id)
{
    try {
        // Fetch the product with the given ID, including associated images and category
        $product = SalePlants::with(['images'])->findOrFail($id);
        

        // Pass the product data to the view
        return view('ShopPlants.Pages.ShopProducts.shopProductDetails', compact('product'));
    } catch (\Exception $e) {
        // Handle errors gracefully
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

}
