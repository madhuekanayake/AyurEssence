<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $services = Service::all();

            return view('PublicArea.Pages.Service.index', compact('services'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
