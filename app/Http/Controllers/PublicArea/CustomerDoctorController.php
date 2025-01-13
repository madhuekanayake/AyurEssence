<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class CustomerDoctorController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $doctors = Doctor::all();

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
