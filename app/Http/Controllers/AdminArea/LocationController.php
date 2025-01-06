<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\AyurvedicHospital;
use App\Models\AyurvedicHospitalImages;
use App\Models\GardenImage;
use App\Models\HerbalGarden;
use App\Models\LocalPharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    public function HerbalGardenAll()
{
    try {

        $herbal_gardens = HerbalGarden::all();

        return view('AdminArea.Pages.Location.herbalGardens', compact('herbal_gardens'));

    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function HerbalGardenAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'gardenName' => 'required|string|max:255', // Garden name is required
        'gardenAddress' => 'required|string|max:500', // Address is required
        'gardenPhone' => 'required|string|max:15', // Phone number is required
        'gardenEmail' => 'required|email|unique:herbal_gardens,gardenEmail', // Ensure email is unique
        'gardenLocation' => 'required|string|max:255', // Location is required
        'gardenOpenTime' => 'required|date_format:H:i', // Open hours in valid time format
        'gardenCloseTime' => 'required|date_format:H:i|after:gardenOpenTime', // Close hours must be after open hours
        'gardenOpenDays' => 'required|string|in:Weekdays,Weekends', // Open days must be valid
        'localTicketPrice' => 'required|numeric|min:0', // Local ticket price must be a positive number
        'foreignTicketPrice' => 'required|numeric|min:0', // Foreign ticket price must be a positive number
        'gardenDescription' => 'required|string|max:1000', // Description is required
    ], [
        'gardenEmail.unique' => 'The email address is already registered.',
        'gardenCloseTime.after' => 'Close hours must be after open hours.',
    ]);

    try {
        $data = $request->all();

        // Generate a unique gardenId
        $data['gardenId'] = 'GDN' . Str::random(6); // Random 6-character string with prefix

        // Save garden data
        HerbalGarden::create($data);

        return back()->with('success', 'Garden added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function HerbalGardenUpdate(Request $request)
{
    // Find the user by ID
    $herbal_gardens = HerbalGarden::find($request->id);

    if (!$herbal_gardens) {
        return back()->withErrors(['error' => 'User not found!']);
    }



    // Validate inputs
    $request->validate([
        'gardenName' => 'required|string|max:255', // Garden name is required
        'gardenAddress' => 'required|string|max:500', // Address is required
        'gardenPhone' => 'required|string|max:15', // Phone number is required
        'gardenEmail' => 'required|email|unique:herbal_gardens,gardenEmail,' . $request->id, // Ensure email is unique
        'gardenLocation' => 'required|string|max:255', // Location is required
        'gardenOpenTime' => 'required',
        'gardenCloseTime' => 'required',
        'gardenOpenDays' => 'required|string|in:Weekdays,Weekends', // Open days must be valid
        'localTicketPrice' => 'required|numeric|min:0', // Local ticket price must be a positive number
        'foreignTicketPrice' => 'required|numeric|min:0', // Foreign ticket price must be a positive number
        'gardenDescription' => 'required|string|max:1000', // Description is required
    ], [
        'gardenEmail.unique' => 'The email address is already registered.',

    ]);

    try {
        // Prepare data for update
        $data = [
            'gardenName' => $request->gardenName,
            'gardenAddress' => $request->gardenAddress,
            'gardenPhone' => $request->gardenPhone,
            'gardenEmail' => $request->gardenEmail,
            'gardenLocation' => $request->gardenLocation,
            'gardenOpenTime' => $request->gardenOpenTime,
            'gardenCloseTime' => $request->gardenCloseTime,
            'gardenOpenDays' => $request->gardenOpenDays,
            'localTicketPrice' => $request->localTicketPrice,
            'foreignTicketPrice' => $request->foreignTicketPrice,
            'gardenDescription' => $request->gardenDescription,

        ];



        // Update user details
        $herbal_gardens->update($data); // Using update method to save the changes

        return redirect()->back()->with('success', 'User updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function HerbalGardenDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:user_roles,id', // Ensure the `users` table and `id` column are correct
        ]);

        // Find the user by ID
        $herbal_gardens = HerbalGarden::findOrFail($request->id); // Replace `User` with the appropriate model if different

        // Delete the user record
        $herbal_gardens->delete();

        // Return success response
        return back()->with('success', 'Garden Details deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the user: ' . $e->getMessage()]);
    }
}

public function GardenImageAdd(Request $request)
    {
        // Validate input data
    $request->validate([

        'gardenId' => 'required',
        'description' => 'required|string|max:500', // Description should be a string
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field (with max size)
    ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['gardenImageId'] = 'GI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/location/garden', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            GardenImage::create($data);

            return back()->with('success', 'Image added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ViewGardenImageAll($gardenId)
{
    try {
        // Fetch gallery data related to the specific gardenId
        $garden_images = GardenImage::where('gardenId', $gardenId)->get();

        return view('AdminArea.Pages.Location.viewGardenImage', compact('garden_images'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ViewGardenImageDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:garden_images,id',
        ]);

        // Find the student by ID
        $garden_images = GardenImage::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($garden_images->image && file_exists(public_path('uploads/' . $garden_images->image))) {
            unlink(public_path('uploads/' . $garden_images->image));
        }

        // Delete the student record
        $garden_images->delete();

        // Return success response
        return back()->with('success', 'Image deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function AyurvedicHospitalAll()
{
    try {

        $ayurvedic_hospitals = AyurvedicHospital::all();


        return view('AdminArea.Pages.Location.ayurvedicHospitals', compact('ayurvedic_hospitals'));

    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function AyurvedicHospitalAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255', // Hospital name is required
        'address' => 'required|string|max:500', // Address is required
        'email' => 'required|email|unique:ayurvedic_hospitals,email', // Ensure email is unique
        'phone' => 'required|string|max:15', // Phone number is required
        'location' => 'required|string|max:255', // Location is required
        'openTime' => 'required|date_format:H:i', // Open hours in valid time format
        'closeTime' => 'required|date_format:H:i|after:openTime', // Close hours must be after open hours
        'openDays' => 'required|in:Weekdays,Weekends,All Days', // Open days description
        'description' => 'required|string|max:1000', // Description is required
    ], [
        'email.unique' => 'The email address is already registered.',
        'closeTime.after' => 'Closing time must be after opening time.',
    ]);

    try {
        $data = $request->all();

        // Generate a unique hospitalId
        $data['ayurvedicHospitalId'] = 'HOSP' . Str::random(6); // Random 6-character string with prefix

        // Save hospital data
        AyurvedicHospital::create($data);

        return back()->with('success', 'Ayurvedic Hospital added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function AyurvedicHospitalUpdate(Request $request)
{
    // Find the hospital by ID
    $hospital = AyurvedicHospital::find($request->id);

    if (!$hospital) {
        return back()->withErrors(['error' => 'Hospital not found!']);
    }

    // Validate inputs
    $request->validate([
        'name' => 'required|string|max:255', // Hospital name is required
        'address' => 'required|string|max:500', // Address is required
        'email' => 'required|email|unique:ayurvedic_hospitals,email,' . $request->id, // Ensure email is unique
        'phone' => 'required|string|max:15', // Phone number is required
        'location' => 'required|string|max:255', // Location is required
        'openTime' => 'required', // Open hours in valid time format
        'closeTime' => 'required', // Close hours must be after open hours
        'openDays' => 'required|in:Weekdays,Weekends,All Days', // Open days description
        'description' => 'required|string|max:1000', // Description is required
    ], [
        'email.unique' => 'The email address is already registered.',
        'closeTime.after' => 'Closing time must be after opening time.',
    ]);

    try {
        // Prepare data for update
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'openTime' => $request->openTime,
            'closeTime' => $request->closeTime,
            'openDays' => $request->openDays,
            'description' => $request->description,
        ];

        // Update hospital details
        $hospital->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Hospital updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function AyurvedicHospitalDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:ayurvedic_hospitals,id', // Ensure the `ayurvedic_hospitals` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $ayurvedic_hospital = AyurvedicHospital::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $ayurvedic_hospital->delete();

        // Return success response
        return back()->with('success', 'Hospital Details deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the hospital: ' . $e->getMessage()]);
    }
}

public function AyurvedicHospitalImageAdd(Request $request)
    {
        // Validate input data
        $request->validate([
            'ayurvedicHospitalId' => 'required|exists:ayurvedic_hospitals,ayurvedicHospitalId',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['ayurvedicHospitalImageId'] = 'TI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/location/ayurvedic_hospital', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            AyurvedicHospitalImages::create($data);

            return back()->with('success', 'Image added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ViewAyurvedicHospitalImageAll($ayurvedicHospitalId)
{
    try {
        // Fetch gallery data related to the specific gardenId
        $ayurvedic_hospital_images = AyurvedicHospitalImages::where('ayurvedicHospitalId', $ayurvedicHospitalId)->get();

        return view('AdminArea.Pages.Location.viewAyurvedicHospitalImage', compact('ayurvedic_hospital_images'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ViewAyurvedicHospitalImageDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:ayurvedic_hospital_images,id',
        ]);

        // Find the student by ID
        $ayurvedic_hospital_images = AyurvedicHospitalImages::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($ayurvedic_hospital_images->image && file_exists(public_path('uploads/' . $ayurvedic_hospital_images->image))) {
            unlink(public_path('uploads/' . $ayurvedic_hospital_images->image));
        }

        // Delete the student record
        $ayurvedic_hospital_images->delete();

        // Return success response
        return back()->with('success', 'Image deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function LocalPharmacyAll()
{
    try {

        $local_pharmacies = LocalPharmacy::all();

        return view('AdminArea.Pages.Location.localPharmacies', compact('local_pharmacies'));

    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function LocalPharmacyAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255', // Hospital name is required
        'address' => 'required|string|max:500', // Address is required
        'email' => 'required|email|unique:local_pharmacies,email', // Ensure email is unique
        'phoneNo' => 'required|string|max:15', // Phone number is required
        'location' => 'required|string|max:255', // Location is required
        'openTime' => 'required|date_format:H:i', // Open hours in valid time format
        'closeTime' => 'required|date_format:H:i|after:openTime', // Close hours must be after open hours
        'openDays' => 'required|in:Weekdays,Weekends,All Days', // Open days description
        'description' => 'required|string|max:1000', // Description is required
    ], [
        'email.unique' => 'The email address is already registered.',
        'closeTime.after' => 'Closing time must be after opening time.',
    ]);

    try {
        $data = $request->all();

        // Generate a unique hospitalId
        $data['localPharmacyId'] = 'LP' . Str::random(6); // Random 6-character string with prefix

        // Save hospital data
        LocalPharmacy::create($data);

        return back()->with('success', 'Local Pharmacy added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function LocalPharmacyUpdate(Request $request)
{
    // Find the hospital by ID
    $hospital = LocalPharmacy::find($request->id);

    if (!$hospital) {
        return back()->withErrors(['error' => 'Pharmacy not found!']);
    }

    // Validate inputs
    $request->validate([
        'name' => 'required|string|max:255', // Hospital name is required
        'address' => 'required|string|max:500', // Address is required
        'email' => 'required|email|unique:local_pharmacies,email,' . $request->id, // Ensure email is unique
        'phoneNo' => 'required|string|max:15', // Phone number is required
        'location' => 'required|string|max:255', // Location is required
        'openTime' => 'required', // Open hours in valid time format
        'closeTime' => 'required', // Close hours must be after open hours
        'openDays' => 'required|in:Weekdays,Weekends,All Days', // Open days description
        'description' => 'required|string|max:1000', // Description is required
    ], [
        'email.unique' => 'The email address is already registered.',
        'closeTime.after' => 'Closing time must be after opening time.',
    ]);

    try {
        // Prepare data for update
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phoneNo' => $request->phoneNo,
            'location' => $request->location,
            'openTime' => $request->openTime,
            'closeTime' => $request->closeTime,
            'openDays' => $request->openDays,
            'description' => $request->description,
        ];

        // Update hospital details
        $hospital->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Pharmacy updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function LocalPharmacyDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:local_pharmacies,id', // Ensure the `local_pharmacies` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $local_pharmacies = LocalPharmacy::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $local_pharmacies->delete();

        // Return success response
        return back()->with('success', 'Pharmacy Details deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the hospital: ' . $e->getMessage()]);
    }
}




}


