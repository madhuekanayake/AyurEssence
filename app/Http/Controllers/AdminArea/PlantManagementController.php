<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\PlantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlantManagementController extends Controller
{
    public function PlantCategoryAll()
{
    try {
        // Fetch all gallery data
        $plant_categories = PlantCategory::all();

        return view('AdminArea.Pages.PlantManagement.plantCategory', compact('plant_categories'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function PlantCategoryAdd(Request $request)
    {
        // Validate input data
        $request->validate([

            'categoryName' => 'required|string|max:255|unique:plant_categories,categoryName', // Ensure the category name is unique
            'description' => 'required|string|max:500', // Description should be a string
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field (with max size)
        ], [

            'categoryName.unique' => 'The category name must be unique. Please choose another name.',
        ]);


        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['plantCategoryId'] = 'PM' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/plantManagement/plantCategory', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            PlantCategory::create($data);

            return back()->with('success', 'Plant Category added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function PlantCategoryUpdate(Request $request)
{
    // Find the gallery item by ID
    $plant_categories = PlantCategory::find($request->id);

    // Validate inputs
    $request->validate([

        'categoryName' => 'required|string|max:255|unique:plant_categories,categoryName', // Ensure the category name is unique
        'description' => 'required|string|max:500', // Description should be a string
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field (with max size)
    ], [

        'categoryName.unique' => 'The category name must be unique. Please choose another name.',
    ]);

    try {
        $data = $request->all();

        // Handle image upload using Laravel Storage
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($plant_categories->image) {
                Storage ::disk('public')->delete($plant_categories->image);
            }

            // Store the new image in 'uploads/images'
            $data['image'] = $request->file('image')->store('uploads/plantManagement/plantCategory', 'public');
        } else {
            // Retain the existing image path if no new image is uploaded
            $data['image'] = $plant_categories->image;
        }

        // Update employee details
        $plant_categories->update([
            'categoryName' => $data['categoryName'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);

        return redirect()->back()->with('success', 'Plant Category updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function PlantCategoryDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:plant_categories,id',
        ]);

        // Find the student by ID
        $plant_categories = PlantCategory::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($plant_categories->image && file_exists(public_path('uploads/' . $plant_categories->image))) {
            unlink(public_path('uploads/' . $plant_categories->image));
        }

        // Delete the student record
        $plant_categories->delete();

        // Return success response
        return back()->with('success', 'Plant Category deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

}
