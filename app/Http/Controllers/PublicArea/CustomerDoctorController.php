<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class CustomerDoctorController extends Controller
{
    public function All(Request $request)
{
    try {
        // Fetch all doctors or filter by search query
        $search = $request->query('search');

        $doctors = Doctor::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return view('PublicArea.Pages.Doctors.index', compact('doctors'));

    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

    public function show($id)
    {
        try {
            // Fetch the doctor with the given ID, including specialization
            $doctor = Doctor::with('specialzations')->findOrFail($id);

            return view('PublicArea.Pages.Doctors.doctorDetails', compact('doctor'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }



}
