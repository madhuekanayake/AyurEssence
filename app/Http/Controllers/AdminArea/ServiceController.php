<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function All()
{
    try {
        // Fetch all service data
        $services = Service::all();

        return view('AdminArea.Pages.Service.index', compact('services'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}


public function Add(Request $request)
    {
        // Validate input data
    $request->validate([
        'title' => 'required|string|max:255|unique:services,title', // Ensure the title is unique
        'description' => 'required|string|max:500', // Description should be a string
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field (with max size)
    ], [
        'title.unique' => 'The service title must be unique. Please choose another title.',
    ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['serviceId'] = 'SV' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/service', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            Service::create($data);

            return back()->with('success', 'Service added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

// public function Add(Request $request)
// {
//     // Validate input data
//     $request->validate([
//                 'title' => 'required|string|max:255|unique:services,title', // Ensure the title is unique
//                 'description' => 'required|string|max:500', // Description should be a string
//                 //'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field (with max size)
//             ], [
//                 'title.unique' => 'The service title must be unique. Please choose another title.',
//             ]);

//     try {
//         $data = $request->all();

//         // Generate a unique blog ID
//         $data['serviceId'] = 'SV' . Str::random(6); // Random 6-character string with prefix

//         // Save blog data
//         Service::create($data);

//         return back()->with('success', 'Service added successfully!');
//     } catch (\Exception $e) {
//         return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
//     }
// }



public function update(Request $request)
{
    // Find the service item by ID
    $service = Service::find($request->id);

    // Validate inputs
    $request->validate([
        'title' => 'required|string|max:255|unique:services,title,' . $service->id, // Ensure the name is unique
        'description' => 'required|string|max:500', // Description is required
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field
    ], [
        'title.unique' => 'The service title must be unique. Please choose another name.',
    ]);


    try {
        $data = $request->all();

        // Handle image upload using Laravel Storage
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($service->image) {
                Storage ::disk('public')->delete($service->image);
            }

            // Store the new image in 'uploads/images'
            $data['image'] = $request->file('image')->store('uploads/service', 'public');
        } else {
            // Retain the existing image path if no new image is uploaded
            $data['image'] = $service->image;
        }

        // Update employee details
        $service->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);

        return redirect()->back()->with('success', 'Service updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

// public function Update(Request $request)
// {
//     // Find the hospital by ID
//     $service = Service::find($request->id);

//     if (!$service) {
//         return back()->withErrors(['error' => 'Ayurveda Guide not found!']);
//     }

//     // Validate inputs
//     $request->validate([
//                 'title' => 'required|string|max:255|unique:services,title,' . $service->id, // Ensure the name is unique
//                 'description' => 'required|string|max:500', // Description is required
//                 //'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field
//             ], [
//                 'title.unique' => 'The service title must be unique. Please choose another name.',
//             ]);
//     try {
//         // Prepare data for update
//         $data = [
//             'title' => $request->title,
//             'description' => $request->description,


//         ];

//         // Update hospital details
//         $service->update($data); // Using the update method to save changes

//         return redirect()->back()->with('success', 'Service updated successfully!');
//     } catch (\Exception $e) {
//         return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
//     }
// }

public function Delete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:services,id',
        ]);

        // Find the service by ID
        $service = Service::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {
            unlink(public_path('uploads/services/' . $service->image));
        }

        // Delete the service record
        $service->delete();

        // Return success response
        return back()->with('success', 'Service deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ServiceImageAdd(Request $request)
    {
        // Validate input data
        $request->validate([
            'serviceId' => 'required|exists:service_images,serviceId',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['serviceImageId'] = 'SI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/service', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            ServiceImage::create($data);

            return back()->with('success', 'Image added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ViewServiceImageAll($serviceId)
{
    try {
        // Fetch gallery data related to the specific gardenId
        $service_images = ServiceImage::where('serviceId', $serviceId)->get();

        return view('AdminArea.Pages.Service.viewServiceImage', compact('service_images'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ViewServiceImageDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:service_images,id',
        ]);

        // Find the student by ID
        $service_images = ServiceImage::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($service_images->image && file_exists(public_path('uploads/' . $service_images->image))) {
            unlink(public_path('uploads/' . $service_images->image));
        }

        // Delete the student record
        $service_images->delete();

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
        $item = ServiceImage::findOrFail($id);

        if ($item->isPrimary == 0) {
            // Deactivate all other records
            ServiceImage::where('id', '!=', $id)->update(['isPrimary' => 0]);

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

}
