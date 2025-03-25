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
    // try {
        // Fetch the product with the given ID, including associated images and category
        $SalePlant = SalePlants::with(['images'])->findOrFail($id);
        $SalePlants = SalePlants::all();


        // Pass the product data to the view
        return view('ShopPlants.Pages.ShopProducts.shopProductDetails', compact('SalePlant','SalePlants'));
    // } catch (\Exception $e) {
    //     // Handle errors gracefully
    //     return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    // }
}


public function checkout(Request $request)
{
    $total = $request->query('total', 0); // Get the total price from the query parameter

    return view('ShopPlants.Pages.ShopProducts.checkout', compact('total'));
}

}
