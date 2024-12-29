<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all(); // Fetch all employee data
        return view('AdminArea.Pages.Sample.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:employees,name',
            'age' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'name.unique' => 'The employee name must be unique. Please choose another name.',
        ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['employeeId'] = 'EMP' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/images', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            Employee::create($data);

            return back()->with('success', 'Employee added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request)
{
    $employee = Employee::findOrFail($request->id);

    $request->validate([
        'name' => 'required|string|max:255|unique:employees,name,' . $employee->id,
        'age' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ], [
        'name.unique' => 'The employee name must be unique. Please choose another name.',
    ]);

    try {
        $data = $request->all();

        // Handle image upload using Laravel Storage
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($employee->image) {
                Storage::disk('public')->delete($employee->image);
            }

            // Store the new image in 'uploads/images'
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        } else {
            // Retain the existing image path if no new image is uploaded
            $data['image'] = $employee->image;
        }

        // Update employee details
        $employee->update([
            'name' => $data['name'],
            'age' => $data['age'],
            'image' => $data['image'],
        ]);

        return redirect()->back()->with('success', 'Employee updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

    public function delete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer|exists:employees,id',
            ]);

            $employee = Employee::findOrFail($request->id);

            // Delete associated image if it exists
            if ($employee->image && file_exists(public_path('uploads/' . $employee->image))) {
                unlink(public_path('uploads/' . $employee->image));
            }

            // Delete the employee record
            $employee->delete();

            return back()->with('success', 'Employee deleted successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
