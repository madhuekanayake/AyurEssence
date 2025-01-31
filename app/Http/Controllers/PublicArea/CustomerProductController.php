<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerProductController extends Controller
{
    public function All()
{
    try {
        // Fetch products with their related images and category
        $products = Product::with(['images', 'category'])->get();

        return view('PublicArea.Pages.Products.index', compact('products'));
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

    public function show($id)
    {
        try {
            // Fetch the blog with the given ID, including associated images
            $product = Product::with('images')->findOrFail($id);

            return view('PublicArea.Pages.Products.productDetails', compact('product'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
