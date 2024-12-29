<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $settings = Setting::all();

            return view('AdminArea.Pages.Setting.index', compact('settings'));
        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function Add(Request $request)
    {
        // Validate input data
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional logo image field
            'websiteName' => 'required|string|max:255|unique:settings,websiteName', // Ensure website name is unique
            'email' => 'required|email|max:255|unique:settings,email', // Ensure email is unique
            'contactNo1' => 'required|string|max:15', // Primary contact number
            'contactNo2' => 'nullable|string|max:15', // Secondary contact number (optional)
            'addressLine1' => 'required|string|max:255',
            'addressLine2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'whatsappLink' => 'nullable|url|max:255', // Validate as URL
            'instagramLink' => 'nullable|url|max:255',
            'facebookLink' => 'nullable|url|max:255',
            'linkedinLink' => 'nullable|url|max:255',
            'twitterLink' => 'nullable|url|max:255',
        ], [
            'websiteName.unique' => 'The website name must be unique. Please choose another name.',
            'email.unique' => 'The email address must be unique. Please provide a different email.',
        ]);
        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['infoId'] = 'INF' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('logo')) {
                // Get the uploaded file
                $file = $request->file('logo');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/logo', 'public');

                // Save the file path to the $data array
                $data['logo'] = $path;
            }

            // Save data
            Setting::create($data);

            return back()->with('success', 'Information added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }




    public function update(Request $request)
    {
        // Find the settings item by ID
        $settings = Setting::find($request->id);

        // Validate inputs
        $request->validate([
            'websiteName' => 'required|string|max:255', // Website name is required
            'email' => 'required|email|max:255', // Email is required and must be a valid email address
            'contactNo1' => 'nullable|string|max:15', // Contact no1 is optional
            'contactNo2' => 'nullable|string|max:15', // Contact no2 is optional
            'city' => 'nullable|string|max:100', // City is optional
            'addressLine1' => 'nullable|string|max:255', // Address line 1 is optional
            'addressLine2' => 'nullable|string|max:255', // Address line 2 is optional
            'whatsappLink' => 'nullable|url|max:255', // WhatsApp link is optional and must be a valid URL
            'instagramLink' => 'nullable|url|max:255', // Instagram link is optional and must be a valid URL
            'facebookLink' => 'nullable|url|max:255', // Facebook link is optional and must be a valid URL
            'linkedinLink' => 'nullable|url|max:255', // LinkedIn link is optional and must be a valid URL
            'twitterLink' => 'nullable|url|max:255', // Twitter link is optional and must be a valid URL
        ]);


        try {
            $data = $request->all();

            // Handle image upload using Laravel Storage
            if ($request->hasFile('logo')) {
                // Delete the old image if it exists
                if ($settings->logo) {
                    Storage::disk('public')->delete($settings->logo);
                }

                // Store the new image in 'uploads/images'
                $data['logo'] = $request->file('logo')->store('uploads/settings', 'public');
            } else {
                // Retain the existing image path if no new image is uploaded
                $data['logo'] = $settings->logo;
            }

            // Update employee details
            $settings->update([
                'websiteName' => $data['websiteName'],
                'email' => $data['email'],
                'contactNo1' => $data['contactNo1'],
                'contactNo2' => $data['contactNo2'],
                'city' => $data['city'],
                'addressLine1' => $data['addressLine1'],
                'addressLine2' => $data['addressLine2'],
                'whatsappLink' => $data['whatsappLink'],
                'instagramLink' => $data['instagramLink'],
                'facebookLink' => $data['facebookLink'],
                'linkedinLink' => $data['linkedinLink'],
                'twitterLink' => $data['twitterLink'],



            ]);

            return redirect()->back()->with('success', 'Service updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    public function Delete(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'id' => 'required|integer|exists:settings,id',  // Assuming the model is 'Setting'
            ]);

            // Find the setting by ID
            $setting = Setting::findOrFail($request->id);

            // If there is any associated image for this setting, delete it (if applicable)
            if ($setting->image && file_exists(public_path('uploads/logo/' . $setting->image))) {
                unlink(public_path('uploads/logo/' . $setting->image));
            }

            // Delete the setting record
            $setting->delete();

            // Return success response
            return back()->with('success', 'Information deleted successfully!');
        } catch (\Exception $e) {
            // Return error response
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function Status($id)
    {
        try {
            $setting = Setting::findOrFail($id);

            if ($setting->status == 0) {
                // Deactivate all other records
                Setting::where('id', '!=', $id)->update(['status' => 0]);

                // Activate the selected record
                $setting->status = 1;
            } else {
                // Deactivate the current record
                $setting->status = 0;
            }

            $setting->save();

            $message = $setting->status ? 'Setting activated successfully!' : 'Setting deactivated successfully!';
            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function UserRoleAll()
    {
        try {
            // Fetch all gallery data
            $user_roles = UserRole::all();

            return view('AdminArea.Pages.Setting.user', compact('user_roles'));

        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function userRoleAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255', // Name is required
        'email' => 'required|email|unique:users,email', // Ensure email is unique
        'phone' => 'required|string|max:15', // Phone number required
        'role' => 'required|string|in:super admin,admin', // Role must be valid
        'password' => 'required|string|min:6', // Password must match confirmation

    ], [
        'email.unique' => 'The email address is already registered.',
        'phone.unique' => 'The phone confirmation does not match.',
    ]);

    try {
        $data = $request->all();

        // Generate a unique userRoleId
        $data['userRoleId'] = 'UR' . Str::random(6); // Random 6-character string with prefix



        // Hash the password before saving
        $data['password'] = bcrypt($data['password']);

        // Save user role data
        UserRole::create($data);

        return back()->with('success', 'User role added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function UserRoleUpdate(Request $request)
{
    // Find the user by ID
    $user = UserRole::find($request->id);

    // Check if the user exists
    if (!$user) {
        return back()->withErrors(['error' => 'User not found!']);
    }

    // Validate inputs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:user_roles,email,' . $request->id,
        'phone' => 'required|string|max:15',
        'password' => 'nullable|string|min:6',  // Password is optional
        'role' => 'required|in:super admin,admin',
    ]);

    try {
        // Prepare data for update
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
        ];

        // Update the password only if provided
        if ($request->password) {
            $data['password'] = bcrypt($request->password); // Encrypt password if provided
        }

        // Update user details
        $user->update($data); // Using update method to save the changes

        return redirect()->back()->with('success', 'User updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}



public function UserRoleDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:user_roles,id', // Ensure the `users` table and `id` column are correct
        ]);

        // Find the user by ID
        $user = UserRole::findOrFail($request->id); // Replace `User` with the appropriate model if different

        // Delete the user record
        $user->delete();

        // Return success response
        return back()->with('success', 'User deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the user: ' . $e->getMessage()]);
    }
}

public function UserRoleStatus($id)
{

    {
        try {
            $user = UserRole::findOrFail($id);

            // Toggle the status
            $user->status = !$user->status;
            $user->save();

            $message = $user->status ? 'User activated successfully!' : 'User deactivated successfully!';

            return redirect()->back()->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}


}
