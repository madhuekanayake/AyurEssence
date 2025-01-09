<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\AyurvedaGuide;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\ConservationAwareness;
use App\Models\MeetingAndEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

public function BlogImageAdd(Request $request)
    {
        // Validate input data
    $request->validate([

        'blogId' => 'required',

        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field (with max size)
    ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['blogImageId'] = 'BI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/educationalContent/blog', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            BlogImage::create($data);

            return back()->with('success', 'Image added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ViewBlogImageAll($blogId)
{
    try {
        // Fetch gallery data related to the specific gardenId
        $blog_images = BlogImage::where('blogId', $blogId)->get();

        return view('AdminArea.Pages.EducationalContent.viewBlogImage', compact('blog_images'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ViewBlogImageDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:blog_images,id',
        ]);

        // Find the student by ID
        $blog_images = BlogImage::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($blog_images->image && file_exists(public_path('uploads/' . $blog_images->image))) {
            unlink(public_path('uploads/' . $blog_images->image));
        }

        // Delete the student record
        $blog_images->delete();

        // Return success response
        return back()->with('success', 'Image deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function isPrimary($id)
{
    try {
        $item = BlogImage::findOrFail($id);

        if ($item->isPrimary == 0) {
            // Deactivate all other records
            BlogImage::where('id', '!=', $id)->update(['isPrimary' => 0]);

            // Activate the selected record
            $item->isPrimary = 1;
        } else {
            // Deactivate the current record
            $item->isPrimary = 0;
        }

        $item->save();

        $message = $item->isPrimary ? 'Item activated successfully!' : 'Item deactivated successfully!';
        return redirect()->back()->with('success', $message);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong!');
    }
}

public function MeetingAndEventAll()
{
    try {
        // Fetch all gallery data
        $meeting_and_events = MeetingAndEvent::all();

        return view('AdminArea.Pages.EducationalContent.meetingAndEvent', compact('meeting_and_events'));


    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function MeetingAndEventAdd(Request $request)
    {
        // Validate input data
        $request->validate([

            'title' => 'required|string|max:255|unique:meeting_and_events,title', // Unique title
            'content' => 'required|string|max:2000', // Content should be a string
            'startDate' => 'required|date|before_or_equal:endDate', // Ensure it's a valid date before or equal to endDate
            'endDate' => 'required|date|after_or_equal:startDate', // Ensure it's a valid date after or equal to startDate
            'startTime' => 'required|date_format:H:i', // Valid time format (HH:mm)
            'endTime' => 'required|date_format:H:i|after:startTime', // Ensure it's after startTime
            'contactNo' => 'required|string|regex:/^\+?[0-9]{10,15}$/', // Validate contact number format
            'description' => 'nullable|string|max:500', // Optional description
        ], [

            'title.unique' => 'The title must be unique. Please choose another title.',

        ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['meetingAndEventlId'] = 'MAE' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/educationalContent/meetingAndEvent', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            MeetingAndEvent::create($data);

            return back()->with('success', 'Meeting And Event added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function MeetingAndEventUpdate(Request $request)
    {
        // Find the gallery item by ID
        $meeting_and_events = MeetingAndEvent::find($request->id);

        // Validate inputs
        $request->validate([

            'title' => 'required|string|max:255|unique:meeting_and_events,title', // Unique title
            'content' => 'required|string|max:2000', // Content should be a string
            'startDate' => 'required|date|before_or_equal:endDate', // Ensure it's a valid date before or equal to endDate
            'endDate' => 'required|date|after_or_equal:startDate', // Ensure it's a valid date after or equal to startDate
            'startTime' => 'required', // Valid time format (HH:mm)
            'endTime' => 'required', // Ensure it's after startTime
            'contactNo' => 'required|string|regex:/^\+?[0-9]{10,15}$/', // Validate contact number format
            'description' => 'nullable|string|max:500', // Optional description
        ], [

            'title.unique' => 'The title must be unique. Please choose another title.',

        ]);

        try {
            $data = $request->all();

            // Handle image upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($meeting_and_events->image) {
                    Storage ::disk('public')->delete($meeting_and_events->image);
                }

                // Store the new image in 'uploads/images'
                $data['image'] = $request->file('image')->store('uploads/educationalContent/meetingAndEvent', 'public');
            } else {
                // Retain the existing image path if no new image is uploaded
                $data['image'] = $meeting_and_events->image;
            }

            // Update employee details
            $meeting_and_events->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'startDate' => $data['startDate'],
                'endDate' => $data['endDate'],
                'startTime' => $data['startTime'],
                'endTime' => $data['endTime'],
                'contactNo' => $data['contactNo'],
                'description' => $data['description'],
                'image' => $data['image'],

            ]);

            return redirect()->back()->with('success', 'Employee updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function MeetingAndEventDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:meeting_and_events,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $meeting_and_events = MeetingAndEvent::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $meeting_and_events->delete();

        // Return success response
        return back()->with('success', 'Blog deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}

public function ConservationAwarenessAll()
{
    try {
        // Fetch all gallery data
        $conservation_awarenesses = ConservationAwareness::all();

        return view('AdminArea.Pages.EducationalContent.conservationAwarenesses', compact('conservation_awarenesses'));


    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ConservationAwarenessAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'endangeredStatus' => 'required|string|max:255', // Ensure status is required and valid string
        'sustainableHarvesting' => 'required', // Must be a boolean value
        'reforestationProjects' => 'required|string|max:500', // Ensure this field is required and limited to 500 characters
        'biodiversityImportance' => 'required|string|max:1000', // Ensure this field is required and has a maximum length of 1000 characters
    ]);

    try {
        $data = $request->all();

        // Generate a unique blog ID
        $data['conservationAwarenessesId'] = 'CA' . Str::random(6); // Random 6-character string with prefix

        // Save blog data
        ConservationAwareness::create($data);

        return back()->with('success', 'Conservation Awarenesses added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ConservationAwarenessUpdate(Request $request)
{
    // Find the hospital by ID
    $conservation_awarenesses = ConservationAwareness::find($request->id);

    if (!$conservation_awarenesses) {
        return back()->withErrors(['error' => 'Conservation Awarenesses Guide not found!']);
    }

    // Validate inputs
    $request->validate([
        'endangeredStatus' => 'required|string|max:255', // Ensure status is required and valid string
        'sustainableHarvesting' => 'required', // Must be a boolean value
        'reforestationProjects' => 'required|string|max:500', // Ensure this field is required and limited to 500 characters
        'biodiversityImportance' => 'required|string|max:1000', // Ensure this field is required and has a maximum length of 1000 characters
    ]);


    try {
        // Prepare data for update
        $data = [
            'endangeredStatus' => $request->endangeredStatus,
            'sustainableHarvesting' => $request->sustainableHarvesting,
            'reforestationProjects' => $request->reforestationProjects,
            'biodiversityImportance' => $request->biodiversityImportance,

        ];

        // Update hospital details
        $conservation_awarenesses->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Conservation Awarenesses updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ConservationAwarenessDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:conservation_awarenesses,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $conservation_awarenesses = ConservationAwareness::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $conservation_awarenesses->delete();

        // Return success response
        return back()->with('success', 'Conservation Awarenesses deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}

}
