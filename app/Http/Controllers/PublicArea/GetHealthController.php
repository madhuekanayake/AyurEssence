<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\GetHealth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GetHealthController extends Controller
{
    public function All()
    {
        return view('PublicArea.Pages.Home.index');
    }


    public function Add(Request $request)
{
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:get_healths,email',
        'phone' => 'required|string|max:15',
        'massage' => 'required|string|max:500',
        'subject' => 'required|string|max:500',
    ], [
        'email.unique' => 'The email address is already registered.',
    ]);

    try {
        // Prepare data for insertion
        $data = $request->only(['name', 'email', 'phone', 'massage','subject']);

        // Generate a unique contact ID
        $data['getHealthId'] = 'GH' . Str::random(6);

        // Save contact us data
        GetHealth::create($data);

        // Redirect back with success message
        return back()->with('success', 'Thank you! Your message has been received.');

    } catch (\Exception $e) {
        // Return back with an error message
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}
}
