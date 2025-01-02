<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\AyurvedaGuide;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EducationalContentController extends Controller
{
    public function AyurvedaGuideAll()
{
    try {
        // Fetch all gallery data
        $ayurveda_guides = AyurvedaGuide::all();

        return view('AdminArea.Pages.EducationalContent.ayurvedaGuide', compact('ayurveda_guides'));


    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function AyurvedaGuideAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'title' => 'required|string|max:255|unique:ayurveda_guides,title', // Ensure title is unique
        'information' => 'required|string|max:1000', // Information is required
        'description' => 'required|string|max:500', // Description is required
    ], [
        'title.unique' => 'The title must be unique. Please choose another title.',
    ]);

    try {
        $data = $request->all();

        // Generate a unique guide ID
        $data['ayurvedaGuideId'] = 'GUIDE' . Str::random(6); // Random 6-character string with prefix

        // Save guide data
        AyurvedaGuide::create($data);

        return back()->with('success', 'Ayurvedic Guide added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}
public function AyurvedaGuideUpdate(Request $request)
{
    // Find the hospital by ID
    $ayurveda_guides = AyurvedaGuide::find($request->id);

    if (!$ayurveda_guides) {
        return back()->withErrors(['error' => 'Ayurveda Guide not found!']);
    }

    // Validate inputs
    $request->validate([
        'title' => 'required|string|max:255|unique:ayurveda_guides,title', // Ensure title is unique
        'information' => 'required|string|max:1000', // Information is required
        'description' => 'required|string|max:500', // Description is required
    ], [
        'title.unique' => 'The title must be unique. Please choose another title.',
    ]);

    try {
        // Prepare data for update
        $data = [
            'title' => $request->title,
            'information' => $request->information,
            'description' => $request->description,

        ];

        // Update hospital details
        $ayurveda_guides->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Ayurveda Guide updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function AyurvedaGuideDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:ayurveda_guides,id', // Ensure the `ayurveda_guides` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $ayurveda_guides = AyurvedaGuide::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $ayurveda_guides->delete();

        // Return success response
        return back()->with('success', 'Ayurveda Guides deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the hospital: ' . $e->getMessage()]);
    }
}


    public function BlogAll()
{
    try {
        // Fetch all gallery data
        $blogs = Blog::all();

        return view('AdminArea.Pages.EducationalContent.blog', compact('blogs'));


    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function BlogAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'title' => 'required|string|max:255|unique:blogs,title', // Ensure title is unique
        'content' => 'required|string|max:5000', // Content is required
        'date' => 'required|date', // Date is required and must be a valid date
        'description' => 'required|string|max:500', // Description is required

    ], [
        'title.unique' => 'The title must be unique. Please choose another title.',
    ]);

    try {
        $data = $request->all();

        // Generate a unique blog ID
        $data['blogId'] = 'BLOG' . Str::random(6); // Random 6-character string with prefix

        // Save blog data
        Blog::create($data);

        return back()->with('success', 'Blog added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function BlogUpdate(Request $request)
{
    // Find the hospital by ID
    $blogs = Blog::find($request->id);

    if (!$blogs) {
        return back()->withErrors(['error' => 'Ayurveda Guide not found!']);
    }

    // Validate inputs
    $request->validate([
        'title' => 'required|string|max:255|unique:blogs,title,' . $request->id, // Allow same title for the current blog
        'content' => 'required|string|max:5000', // Ensure content is validated
        'publish_date' => 'required|date', // Ensure publish_date matches
        'description' => 'required|string|max:500',
    ], [
        'title.unique' => 'The title must be unique. Please choose another title.',
    ]);


    try {
        // Prepare data for update
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'publish_date' => $request->publish_date,
            'description' => $request->description,

        ];

        // Update hospital details
        $blogs->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Blog updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function BlogDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:blogs,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $blogs = Blog::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $blogs->delete();

        // Return success response
        return back()->with('success', 'Blog deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}

}
