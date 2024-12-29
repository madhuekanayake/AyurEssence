<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function All()
{
    try {
        // Fetch all student data
        $students = Students::all();

        return view('AdminArea.Pages.Test.index', compact('students'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}


public function Add(Request $request)
{
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255|unique:students,name', // Ensure the name is unique
        'age' => 'required|integer|min:0', // Age should be a positive integer
        'grade' => 'required|string|max:255', // Grade should be a string
        'email' => 'required|email|unique:students,email', // Ensure the email is unique
        'phone' => 'required|string|max:15', // Phone should be a string, adjust max length as needed
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field
    ], [
        'name.unique' => 'The student name must be unique. Please choose another name.',
        'email.unique' => 'The email address is already registered.',
    ]);

    try {
        // Collect all input data
        $data = $request->all();

        // Generate a unique studentId
        $data['studentId'] = 'STU' . Str::random(6); // Random 6-character string with prefix 'STU'

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/student'), $filename); // Save image to 'uploads' folder
            $data['image'] = $filename; // Store the image filename in the database
        }

        // Create and save the new student data
        Students::create($data);

        // Redirect back with a success message
        return back()->with('success', 'Student added successfully!');
    } catch (\Exception $e) {
        // Handle any exceptions and return the error message
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function Update(Request $request)
{
    // Find the student by ID
    $student = Students::find($request->id);

    // Validate inputs
    $request->validate([
        'name' => 'required|string|max:255|unique:students,name,' . $student->id,
        'age' => 'required|integer|min:0',
        'grade' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email,' . $student->id,
        'phone' => 'required|string|max:15',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ], [
        'name.unique' => 'The student name must be unique. Please choose another name.',
        'email.unique' => 'The email must be unique. Please use another email.',
    ]);

    try {
        // Update student details
        $student->name = $request->name;
        $student->age = $request->age;
        $student->grade = $request->grade;
        $student->email = $request->email;
        $student->phone = $request->phone;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($student->image && file_exists(public_path('uploads/' . $student->image))) {
                unlink(public_path('uploads/' . $student->image));
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $student->image = $imageName;
        }

        $student->save();
        return redirect()->back()->with('success', 'Student updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function Delete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:students,id',
        ]);

        // Find the student by ID
        $student = Students::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($student->image && file_exists(public_path('uploads/' . $student->image))) {
            unlink(public_path('uploads/' . $student->image));
        }

        // Delete the student record
        $student->delete();

        // Return success response
        return back()->with('success', 'Student deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}







}
