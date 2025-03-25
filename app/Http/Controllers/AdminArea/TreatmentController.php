<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use App\Models\TreatmentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TreatmentController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $treatments = Treatment::all();

            return view('AdminArea.Pages.Treatment.index', compact('treatments'));
        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function Add(Request $request)
{
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255|unique:treatments,name', // Ensure name is unique
        'description' => 'required|string|max:500', // Description is required
        'content' => 'required|string|max:5000', // Content is required
        'ingredients' => 'required|string|max:1000', // Ingredients are required
        'benefits' => 'required|string|max:1000', // Benefits are required
    ], [
        'name.unique' => 'The treatment name must be unique. Please choose another name.',
    ]);

    try {
        $data = $request->all();

        // Generate a unique treatment ID
        $data['treatmentId'] = 'TREAT' . Str::random(6); // Random 6-character string with prefix

        // Save treatment data
        Treatment::create($data);

        return back()->with('success', 'Treatment added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function Update(Request $request)
{
    // Find the hospital by ID
    $treatments = Treatment::find($request->id);

    if (!$treatments) {
        return back()->withErrors(['error' => 'Ayurveda Guide not found!']);
    }

    // Validate inputs
    $request->validate([
        'name' => 'required|string|max:255|unique:treatments,name,' . $request->id, // Added exception for current record
        'description' => 'required|string|max:500',
        'content' => 'required|string|max:5000',
        'ingredients' => 'required|string|max:1000',
        'benefits' => 'required|string|max:1000',
    ], [
        'name.unique' => 'The treatment name must be unique. Please choose another name.',
    ]);


    try {
        // Prepare data for update
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'content' => $request->content,
            'ingredients' => $request->ingredients,
            'benefits' => $request->benefits,

        ];

        // Update hospital details
        $treatments->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Treatment updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function Delete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:treatments,id', // Ensure the `treatments` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $treatments = Treatment::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $treatments->delete();

        // Return success response
        return back()->with('success', 'Treatment deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}

public function TreatmentImageAdd(Request $request)
    {
        // Validate input data
        $request->validate([
            'treatmentId' => 'required|exists:treatments,treatmentId',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['treatmentImageId'] = 'TI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/treatment', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            TreatmentImage::create($data);

            return back()->with('success', 'Image added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ViewTreatmentImageAll($treatmentId)
{
    try {
        // Fetch gallery data related to the specific gardenId
        $treatment_images = TreatmentImage::where('treatmentId', $treatmentId)->get();

        return view('AdminArea.Pages.Treatment.viewTreatmentImage', compact('treatment_images'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ViewTreatmentImageDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:treatment_images,id',
        ]);

        // Find the student by ID
        $treatment_images = TreatmentImage::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($treatment_images->image && file_exists(public_path('uploads/' . $treatment_images->image))) {
            unlink(public_path('uploads/' . $treatment_images->image));
        }

        // Delete the student record
        $treatment_images->delete();

        // Return success response
        return back()->with('success', 'Image deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function isPrimary($id)
{
    try {
        $treatment = TreatmentImage::findOrFail($id);

        // Check the blog ID of the selected image
        $treatmentId = $treatment->treatmentId;

        if ($treatment->isPrimary == 0) {
            // Deactivate all other records for the same blogId
            TreatmentImage::where('treatmentId', $treatmentId)->update(['isPrimary' => 0]);

            // Activate the selected record
            $treatment->isPrimary = 1;
        } else {
            // Deactivate the current record
            $treatment->isPrimary = 0;
        }

        $treatment->save();

        $message = $treatment->isPrimary ? 'Image marked as primary successfully!' : 'Image unmarked as primary successfully!';
        return redirect()->back()->with('success', $message);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}
}
