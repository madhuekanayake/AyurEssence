<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index()
    {
        return view('AdminArea.Pages.Sample.index');
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'city' => 'required|string|max:255',
            'gender' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $validated;

            if ($request->hasFile('image')) {
                // Save the uploaded image and store its path
                $data['image_path'] = $request->file('image')->store('sample_images', 'public');
            }

            // Hash the password for secure storage
            $data['password'] = bcrypt($data['password']);

            // Create a new record in the database
            Test::create($data);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Sample added successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message in case of exception
            return redirect()->back()->with('error', 'Failed to add sample: ' . $e->getMessage());
        }
    }
}
