<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Specialzation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DoctorManagementController extends Controller
{
    public function SpecializationAll()
{
    try {
        // Fetch all gallery data
        $specialzations = Specialzation::all();

        return view('AdminArea.Pages.DoctorManagement.specialization', compact('specialzations'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}



    public function SpecializationAdd(Request $request)
{
    // Validate input data
    $request->validate([

        'specializationName' => 'required|string|max:255|unique:specialzations,specializationName', // Ensure specializationName is unique
        'description' => 'required|string|max:500', // Description is required
    ], [

        'specializationName.unique' => 'The specialization name must be unique. Please choose another name.',
    ]);


    try {
        $data = $request->all();

        // Generate a unique blog ID
        $data['specializationId'] = 'SPEC' . Str::random(6); // Random 6-character string with prefix

        // Save blog data
        Specialzation::create($data);

        return back()->with('success', 'Specialization added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function SpecializationUpdate(Request $request)
{
    // Find the hospital by ID
    $specialzations = Specialzation::find($request->id);

    if (!$specialzations) {
        return back()->withErrors(['error' => 'Ayurveda Guide not found!']);
    }

    // Validate inputs
    $request->validate([

        'specializationName' => 'required|string|max:255|unique:specialzations,specializationName', // Ensure specializationName is unique
        'description' => 'required|string|max:500', // Description is required
    ], [

        'specializationName.unique' => 'The specialization name must be unique. Please choose another name.',
    ]);


    try {
        // Prepare data for update
        $data = [
            'specializationName' => $request->specializationName,
            'description' => $request->description,

        ];

        // Update hospital details
        $specialzations->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Blog updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function SpecializationDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:specialzations,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $specializations = Specialzation::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $specializations->delete();

        // Return success response
        return back()->with('success', 'Specialization deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}
}
