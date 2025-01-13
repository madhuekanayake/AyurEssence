<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactUsController extends Controller
{
    public function All()
    {
        return view('PublicArea.Pages.ContactUs.index');
    }


    public function Add(Request $request)
{
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:contact_us,email',
        'phoneNo' => 'required|string|max:15',
        'massage' => 'required|string|max:500',
    ], [
        'email.unique' => 'The email address is already registered.',
    ]);

    try {
        // Prepare data for insertion
        $data = $request->only(['name', 'email', 'phoneNo', 'massage']);

        // Generate a unique contact ID
        $data['contactUsId'] = 'CU' . Str::random(6);

        // Save contact us data
        ContactUs::create($data);

        // Redirect back with success message
        return back()->with('success', 'Thank you! Your message has been received.');
    } catch (\Exception $e) {
        // Return back with an error message
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function NewsLetterAdd(Request $request)
{
    // Validate input data
    $request->validate([

        'email' => 'required|email|unique:news_letters,email',

    ], [
        'email.unique' => 'The email address is already registered.',
    ]);

    try {
        // Prepare data for insertion
        $data = $request->only(['email']);

        // Generate a unique contact ID
        $data['newsLetterId'] = 'NL' . Str::random(6);

        // Save contact us data
        NewsLetter::create($data);

        // Redirect back with success message
        return back()->with('success', 'Thank you! Your NewsLetter has been received.');
    } catch (\Exception $e) {
        // Return back with an error message
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

}
