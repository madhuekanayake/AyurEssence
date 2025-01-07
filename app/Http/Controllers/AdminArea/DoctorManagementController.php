<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
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

public function DoctorAll()
{
    try {
        // Fetch doctors with specializations
        $doctors = Doctor::with('specialzations')->get();
        $specialzations = Specialzation::all();

        return view('AdminArea.Pages.DoctorManagement.doctor', compact('doctors', 'specialzations'));
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function DoctorAdd(Request $request)
    {
        // Validate input data
        $request->validate([

            'name' => 'required|string|max:255', // Name should be a string with max length
            'email' => 'required|email|unique:doctors,email', // Ensure email is unique and valid
            'phoneNo' => 'required|string|regex:/^[0-9]{10}$/', // Phone number validation (e.g., 10 digits)
            'gender' => 'required', // Gender can be one of male, female, or other
            'profilePicture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field
            'specializationId' => 'required|string|exists:specialzations,specializationId',
            'yearsOfExperience' => 'required|integer|min:0', // Years of experience must be a non-negative integer
            'qualification' => 'required|string|max:500', // Qualification should be a string
            'registerNo' => 'required|string|max:255|unique:doctors,registerNo', // Ensure registerNo is unique
            'workplaceName' => 'required|string|max:255', // Workplace name should be a string
            'availableDays' => 'required', // Available days should be an array with at least one value
            'consultationStartTime' => 'required', // Start time should follow HH:mm format
            'consultationEndTime' => 'required', // End time should be after start time
            'description' => 'required|string|max:1000', // Description should be a string with a max length
        ], [

            'email.unique' => 'The email address is already registered.',
            'registerNo.unique' => 'The registration number must be unique.',
            'phoneNo.regex' => 'The phone number must be a valid 10-digit number.',

        ]);


        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['doctorId'] = 'DI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('profilePicture')) {
                // Get the uploaded file
                $file = $request->file('profilePicture');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/doctor', 'public');

                // Save the file path to the $data array
                $data['profilePicture'] = $path;
            }

            // Save data
            Doctor::create($data);

            return back()->with('success', 'Doctor added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
