<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\PlantCategory;
use App\Models\PlantDiseases;
use App\Models\PlantDiseasesImage;
use App\Models\PlantImage;
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

public function PlantAll()
{
    try {
        // Fetch plants with their categories
        $plants = Plant::with('category')->get();
        $plant_categories = PlantCategory::all();

        return view('AdminArea.Pages.PlantManagement.plant', compact('plants','plant_categories'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}
public function PlantAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'plantname' => 'required|string|max:255',
        'plantCategoryId' => 'required|string|exists:plant_categories,plantCategoryId',
        'medicalUses' => 'required|string|max:1000',
        'scientificName' => 'required|string|max:255',
        'growthRequirements' => 'nullable|string|max:1000',
        'geographicalDistribution' => 'nullable|string|max:1000',
        'partUsed' => 'nullable|string|max:255',
        'traditionalUses' => 'nullable|string|max:1000',
        'modernUses' => 'nullable|string|max:1000',
        'toxicityInformation' => 'nullable|string|max:1000',
        'availability' => 'required|boolean', // Assuming availability is a Yes/No field
        'associatedDiseases' => 'nullable|string|max:1000',
        'description' => 'required|string|max:1000',
    ]);


    try {
        $data = $request->all();

        // Generate a unique productId
        $data['plantId'] = 'PI' . Str::random(6);

        // Save the product data
        Plant::create($data);

        return back()->with('success', 'Plant added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}


public function PlantUpdate(Request $request)
{
    // Find the plant by ID
    $plant = Plant::find($request->id);

    if (!$plant) {
        return back()->withErrors(['error' => 'Plant not found!']);
    }

    // Validate inputs
    $request->validate([
        'edit_plantname' => 'required|string|max:255',
        'edit_scientificName' => 'required|string|max:255',
        'edit_plantCategoryId' => 'required|string|exists:plant_categories,plantCategoryId',
        'edit_availability' => 'required|boolean', // Assuming availability is a Yes/No field
        'edit_growthRequirements' => 'nullable|string|max:1000',
        'edit_geographicalDistribution' => 'nullable|string|max:1000',
        'edit_partUsed' => 'nullable|string|max:255',
        'edit_traditionalUses' => 'nullable|string|max:1000',
        'edit_modernUses' => 'nullable|string|max:1000',
        'edit_toxicityInformation' => 'nullable|string|max:1000',
        'edit_associatedDiseases' => 'nullable|string|max:1000',
        'edit_medicalUses' => 'required|string|max:1000',
        'edit_description' => 'required|string|max:1000',
    ]);

    try {
        // Prepare data for update
        $data = [
            'plantname' => $request->edit_plantname,
            'scientificName' => $request->edit_scientificName,
            'plantCategoryId' => $request->edit_plantCategoryId,
            'availability' => $request->edit_availability,
            'growthRequirements' => $request->edit_growthRequirements,
            'geographicalDistribution' => $request->edit_geographicalDistribution,
            'partUsed' => $request->edit_partUsed,
            'traditionalUses' => $request->edit_traditionalUses,
            'modernUses' => $request->edit_modernUses,
            'toxicityInformation' => $request->edit_toxicityInformation,
            'associatedDiseases' => $request->edit_associatedDiseases,
            'medicalUses' => $request->edit_medicalUses,
            'description' => $request->edit_description,
        ];

        // Update the plant details
        $plant->update($data);

        return redirect()->back()->with('success', 'Plant updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}



    public function PlantDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:plants,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $plants = Plant::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $plants->delete();

        // Return success response
        return back()->with('success', 'Plant deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}


public function PlantImageAdd(Request $request)
    {
        // Validate input data
        $request->validate([
            'plantId' => 'required|exists:plants,plantId',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['plantImageId'] = 'TI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/plantManagement/plant', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            PlantImage::create($data);

            return back()->with('success', 'Image added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ViewPlantImageAll($plantId)
{
    try {
        // Fetch gallery data related to the specific gardenId
        $plant_images = PlantImage::where('plantId', $plantId)->get();

        return view('AdminArea.Pages.PlantManagement.viewPlantImage', compact('plant_images'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ViewPlantImageDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:plant_images,id',
        ]);

        // Find the student by ID
        $plant_images = PlantImage::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($plant_images->image && file_exists(public_path('uploads/' . $plant_images->image))) {
            unlink(public_path('uploads/' . $plant_images->image));
        }

        // Delete the student record
        $plant_images->delete();

        // Return success response
        return back()->with('success', 'Image deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function IsPrimary($id)
{
    try {
        $item = PlantImage::findOrFail($id);

        if ($item->isPrimary == 0) {
            // Deactivate all other records
            PlantImage::where('id', '!=', $id)->update(['isPrimary' => 0]);

            // Activate the selected record
            $item->isPrimary = 1;
        } else {
            // Deactivate the current record
            $item->isPrimary = 0;
        }

        $item->save();

        $message = $item->isPrimary ? 'Item activated successfully!' : 'Item deactivated successfully!';
        return redirect()->back()->with('success', $message);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong!');
    }
}

public function PlantDiseasesAll()
{
    try {
        // Fetch all gallery data
        $plant_diseases = PlantDiseases::all();

        return view('AdminArea.Pages.PlantManagement.plantDiseases', compact('plant_diseases'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function PlantDiseasesAdd(Request $request)
{
    // Validate input data

    $request->validate([
        'diseasesName' => 'required|string|max:255|unique:plant_diseases,diseasesName', // Ensure diseasesName is unique
        'symptoms' => 'required|string|max:1000', // Symptoms are required with a maximum length
        'impact' => 'required|string|max:1000', // Impact is required
        'cause' => 'required|string|max:1000', // Cause is required
        'treatment' => 'required|string|max:1000', // Treatment is required
        'plantsAffected' => 'required|string|max:1000', // Plants Affected is required
    ], [
        'diseasesName.unique' => 'The disease name must be unique. Please choose another name.',

    ]);



    try {
        $data = $request->all();

        // Generate a unique blog ID
        $data['diseasesId'] = 'DS' . Str::random(6); // Random 6-character string with prefix

        // Save blog data
        PlantDiseases::create($data);

        return back()->with('success', 'Plant Deseases added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function PlantDiseasesUpdate(Request $request)
{
    // Find the hospital by ID
    $plant_diseases = PlantDiseases::find($request->id);

    if (!$plant_diseases) {
        return back()->withErrors(['error' => 'Plant Deseases Guide not found!']);
    }

    // Validate inputs
    $request->validate([
        'edit_diseasesName' => 'required|string|max:255|unique:plant_diseases,diseasesName,' . $plant_diseases->id,
        'edit_symptoms' => 'required|string|max:1000',
        'edit_impact' => 'required|string|max:1000',
        'edit_cause' => 'required|string|max:1000',
        'edit_treatment' => 'required|string|max:1000',
        'edit_plantsAffected' => 'required|string|max:1000',
    ], [
        'edit_diseasesName.required' => 'Disease Name is required.',

    ]);


    try {
        // Prepare data for update
        $data = [
            'diseasesName' => $request->edit_diseasesName,
            'symptoms' => $request->edit_symptoms,
            'impact' => $request->edit_impact,
            'cause' => $request->edit_cause,
            'treatment' => $request->edit_treatment,
            'plantsAffected' => $request->edit_plantsAffected,

        ];

        // Update hospital details
        $plant_diseases->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Plant Diseases  updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function PlantDiseasesDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:plant_diseases,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $plant_diseases = PlantDiseases::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $plant_diseases->delete();

        // Return success response
        return back()->with('success', 'Plant Diseases deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}

public function PlantDiseasesImageAdd(Request $request)
    {
        // Validate input data
        $request->validate([
            'diseasesId' => 'required|exists:plant_diseases,diseasesId',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['plantDiseasesImageId'] = 'PDI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/plantManagement/plantDiseases', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            PlantDiseasesImage::create($data);

            return back()->with('success', 'Image added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ViewPlantDiseasesImageAll($diseasesId)
{
    try {
        // Fetch gallery data related to the specific gardenId
        $plant_diseases_images = PlantDiseasesImage::where('diseasesId', $diseasesId)->get();

        return view('AdminArea.Pages.PlantManagement.viewPlantDiseasesImage', compact('plant_diseases_images'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ViewPlantDiseasesImageDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:plant_diseases_images,id',
        ]);

        // Find the student by ID
        $plant_diseases_images = PlantDiseasesImage::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($plant_diseases_images->image && file_exists(public_path('uploads/' . $plant_diseases_images->image))) {
            unlink(public_path('uploads/' . $plant_diseases_images->image));
        }

        // Delete the student record
        $plant_diseases_images->delete();

        // Return success response
        return back()->with('success', 'Image deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}
}
