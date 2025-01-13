<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class CustomerGalleryController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $galleries = Gallery::all();

            return view('PublicArea.Pages.Gallery.index', compact('galleries'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
