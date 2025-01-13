<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class WebsiteDataController extends Controller
{
    public function FooterAll()
{
    try {
        // Fetch only settings with status = 1
        
        $settings = Setting::all();

        // Pass the settings to the footer view
        return view('PublicArea.Layout.footer', compact('settings'));

    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}


}
