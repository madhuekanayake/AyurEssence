<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\PlantCategory;
use App\Models\Portfolio;
use App\Models\SalePlantImage;
use App\Models\SalePlants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SalePlantsController extends Controller
{
    public function All()
{
    try {
        // Fetch plants with their categories
        $sale_plants = SalePlants::with('category')->get();
        $plant_categories = PlantCategory::all();

        return view('AdminArea.Pages.Shop.index', compact('sale_plants','plant_categories'));

    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function Add(Request $request)
{
    // Validate input data
    $request->validate([
        'plantname' => 'required|string|max:255',
        'plantCategoryId' => 'required|string|exists:plant_categories,plantCategoryId',
        'scientificName' => 'nullable|string|max:255',
        'price' => 'required|numeric|min:0',
        'stockQuantity' => 'required|integer|min:0',
        'discount' => 'nullable|numeric|min:0|max:100', // Assuming discount is a percentage
        'finalPrice'=> 'required|numeric|min:0',
        'plantingRequirements' => 'nullable|string|max:1000',
        'maintenanceLevel' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:2000',
    ]);



    try {
        $data = $request->all();

        // Generate a unique productId
        $data['salePlantId'] = 'SPI' . Str::random(6);

        // Save the product data
        SalePlants::create($data);

        return back()->with('success', 'Sale Plant added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function Update(Request $request)
{
    // Find the plant by ID
    $sale_plants = SalePlants::find($request->id);

    if (!$sale_plants) {
        return back()->withErrors(['error' => 'Plant not found!']);
    }

    // Validate inputs
    $request->validate([
        'plantname' => 'required|string|max:255',
        'plantCategoryId' => 'required|string|exists:plant_categories,plantCategoryId',
        'scientificName' => 'nullable|string|max:255',
        'price' => 'required|numeric|min:0',
        'stockQuantity' => 'required|integer|min:0',
        'discount' => 'nullable|numeric|min:0|max:100', // Assuming discount is a percentage
        'finalPrice' => 'nullable|numeric|min:0',
        'plantingRequirements' => 'nullable|string|max:1000',
        'maintenanceLevel' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:2000',
    ]);

    try {
        // Prepare data for update
        $data = [
            'plantname' => $request->plantname,
            'plantCategoryId' => $request->plantCategoryId,
            'scientificName' => $request->scientificName,
            'price' => $request->price,
            'stockQuantity' => $request->stockQuantity,
            'discount' => $request->discount,
            'finalPrice' => $request->finalPrice, // Ensure this value is calculated before submission
            'plantingRequirements' => $request->plantingRequirements,
            'maintenanceLevel' => $request->maintenanceLevel,
            'description' => $request->description,
        ];

        // Update the plant details
        $sale_plants->update($data);

        return redirect()->back()->with('success', 'Sale Plant updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}
public function Delete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:sale_plants,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $sale_plants = SalePlants::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $sale_plants->delete();

        // Return success response
        return back()->with('success', 'Sale Plant deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}

public function PlantImageAdd(Request $request)
    {
        // Validate input data
        $request->validate([
            'salePlantId' => 'required|exists:sale_plants,salePlantId',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['saleplantImageId'] = 'SPI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/salePlant/plant', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            SalePlantImage::create($data);

            return back()->with('success', 'Image added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ViewPlantImageAll($salePlantId)
{
    try {
        // Fetch gallery data related to the specific gardenId
        $sale_plant_images = SalePlantImage::where('salePlantId', $salePlantId)->get();

        return view('AdminArea.Pages.Shop.viewSalePlantImage', compact('sale_plant_images'));
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
            'id' => 'required|integer|exists:sale_plant_images,id',
        ]);

        // Find the student by ID
        $sale_plant_images = SalePlantImage::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($sale_plant_images->image && file_exists(public_path('uploads/' . $sale_plant_images->image))) {
            unlink(public_path('uploads/' . $sale_plant_images->image));
        }

        // Delete the student record
        $sale_plant_images->delete();

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
        $item = SalePlantImage::findOrFail($id);

        // Check the blog ID of the selected image
        $salePlantId = $item->salePlantId;

        if ($item->isPrimary == 0) {
            // Deactivate all other records for the same blogId
            SalePlantImage::where('salePlantId', $salePlantId)->update(['isPrimary' => 0]);

            // Activate the selected record
            $item->isPrimary = 1;
        } else {
            // Deactivate the current record
            $item->isPrimary = 0;
        }

        $item->save();

        $message = $item->isPrimary ? 'Image marked as primary successfully!' : 'Image unmarked as primary successfully!';
        return redirect()->back()->with('success', $message);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function PortfolioAll()
{
    try {
        // Fetch all gallery data
        $portfolios = Portfolio::all();

        return view('AdminArea.Pages.Shop.portfolio', compact('portfolios'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function PortfolioAdd(Request $request)
    {
        // Validate input data
    $request->validate([
        'title' => 'required|string|max:255|unique:portfolios,title', // Ensure the title is unique

        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field (with max size)
    ], [
        'title.unique' => 'The gallery title must be unique. Please choose another title.',
    ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['portfolioId'] = 'PI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/portfolio', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            Portfolio::create($data);

            return back()->with('success', 'Portfolio added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }


    public function PortfolioUpdate(Request $request)
    {
        // Find the gallery item by ID
        $portfolios = Portfolio::find($request->portfolioId); // Use portfolioId here

        // Check if portfolio exists
        if (!$portfolios) {
            return redirect()->back()->withErrors(['error' => 'Portfolio not found.']);
        }

        // Validate inputs
        $request->validate([
            'title' => 'required|string|max:255|unique:portfolios,title,' . $portfolios->id, // Ensure the name is unique
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field
        ], [
            'title.unique' => 'The gallery title must be unique. Please choose another name.',
        ]);

        try {
            $data = $request->all();

            // Handle image upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($portfolios->image) {
                    Storage::disk('public')->delete($portfolios->image);
                }

                // Store the new image in 'uploads/images'
                $data['image'] = $request->file('image')->store('uploads/portfolio', 'public');
            } else {
                // Retain the existing image path if no new image is uploaded
                $data['image'] = $portfolios->image;
            }

            // Update portfolio details
            $portfolios->update([
                'title' => $data['title'],
                'image' => $data['image'],
            ]);

            return redirect()->back()->with('success', 'Portfolio updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }


public function PortfolioDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:portfolios,id',
        ]);

        // Find the student by ID
        $portfolios = Portfolio::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($portfolios->image && file_exists(public_path('uploads/' . $portfolios->image))) {
            unlink(public_path('uploads/' . $portfolios->image));
        }

        // Delete the student record
        $portfolios->delete();

        // Return success response
        return back()->with('success', 'Portfolio deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}



}
