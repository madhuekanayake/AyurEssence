<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Mail\GetHealthReply;
use App\Models\ContactUs;
use App\Models\GetHealth;
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
    // Validate input
    $request->validate([
        'subject' => 'required|string|max:255|regex:/^\S.*$/',
        'message' => 'required|string|regex:/^\S.*$/',
    ]);

    // Fetch all subscription emails
    $subscriptions = Newsletter::pluck('email');

    try {
        // Use Laravel's queue for sending bulk emails
        foreach ($subscriptions as $email) {
            Mail::to($email)->queue((new \App\Mail\SubscriptionReply($request->subject, $request->message))->onQueue('emails'));

        }

        return back()->with('success', 'Emails sent successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Failed to send emails: ' . $e->getMessage()]);
    }
}

public function GetHealthAll()
    {
        try {
            // Fetch all gallery data
            $get_healths = GetHealth::all();

            return view('AdminArea.Pages.Customer.getHealth', compact('get_healths'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function GetHealthDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:get_healths,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $get_healths = GetHealth::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $get_healths->delete();

        // Return success response
        return back()->with('success', 'Info deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the get healths: ' . $e->getMessage()]);
    }
}

public function GetHealthSendReply(Request $request)
{
    $request->validate([
        'id' => 'required|exists:get_healths,id',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    $get_healths = GetHealth::findOrFail($request->id);

    // Update the database
    $get_healths->update([
        'reply_message' => $request->message,
        'isReply' => true,
    ]);

    // Send email using Laravel's Mailable
    try {
        Mail::to($request->email)->queue(new GetHealthReply($request->subject, $request->message));

        return back()->with('success', 'Reply sent and saved successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Mail sending failed: ' . $e->getMessage()]);
    }
}

}
