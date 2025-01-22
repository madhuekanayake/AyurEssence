<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

public function sendReply(Request $request)
{
    $request->validate([
        'id' => 'required|exists:contact_us,id',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    $contact = ContactUs::findOrFail($request->id);

    // Update the database
    $contact->update([
        'reply_message' => $request->message,
        'isReply' => true,
    ]);

    // Send email using Laravel's Mailable
    try {
        Mail::to($request->email)->queue(new \App\Mail\ContactReply($request->subject, $request->message));

        return back()->with('success', 'Reply sent and saved successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Mail sending failed: ' . $e->getMessage()]);
    }
}

public function sendBulkEmail(Request $request)
{
    $request->validate([
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Get all subscription emails
    $subscriptions = Newsletter::pluck('email');

    try {
        foreach ($subscriptions as $email) {
            // Send email using Laravel's Mailable
            Mail::to($email)->queue(new \App\Mail\ContactReply($request->subject, $request->message));
        }

        return back()->with('success', 'Emails sent successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Failed to send emails: ' . $e->getMessage()]);
    }
}


}
