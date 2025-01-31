<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\MeetingAndEvent;
use Illuminate\Http\Request;

class CustomerMeetingsOrEventsController extends Controller
{
    public function All()
    {
        try {
            // Fetch blogs with their related images
            $meeting_and_events = MeetingAndEvent::all();

            return view('PublicArea.Pages.MeetingsAndEvents.index', compact('meeting_and_events'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            // Fetch the blog with the given ID, including associated images
            $meeting_and_events = MeetingAndEvent::findOrFail($id);

            return view('PublicArea.Pages.MeetingsAndEvents.meetingsAndEventsDetails', compact('meeting_and_events'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }


}
