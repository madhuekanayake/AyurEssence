<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class CustomerManagementController extends Controller
{
    public function ContactUsAll()
    {
        try {
            // Fetch all gallery data
            $contact_us = ContactUs::all();

            return view('AdminArea.Pages.Customer.contactUs', compact('contact_us'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ContactUsDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:contact_us,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $contact_us = ContactUs::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $contact_us->delete();

        // Return success response
        return back()->with('success', 'Info deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}

public function NewsLetterAll()
    {
        try {
            // Fetch all gallery data
            $news_letters = NewsLetter::all();

            return view('AdminArea.Pages.Customer.newsLetter', compact('news_letters'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function NewsLetterDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:news_letters,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $news_letters = NewsLetter::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $news_letters->delete();

        // Return success response
        return back()->with('success', 'E mail deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}
}
