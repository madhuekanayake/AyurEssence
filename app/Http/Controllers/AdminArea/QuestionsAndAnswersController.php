<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\QuestionsAndAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionsAndAnswersController extends Controller
{
    public function All()
{
    try {
        // Fetch all gallery data
        $questions_and_answers = QuestionsAndAnswers::all();

        return view('AdminArea.Pages.QuestionsAndAnswers.index', compact('questions_and_answers'));


    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function Add(Request $request)
{
    // Validate input data
    $request->validate([
        'question' => 'required|string|max:1000|unique:questions_and_answers,question', // Ensure question is unique
        'answer' => 'required|string|max:5000', // Answer is required

    ], [
        'question.unique' => 'The question must be unique. Please enter a different question.',
    ]);


    try {
        $data = $request->all();

        // Generate a unique blog ID
        $data['questionsAndAnswersId'] = 'QA' . Str::random(6); // Random 6-character string with prefix

        // Save blog data
        QuestionsAndAnswers::create($data);

        return back()->with('success', 'Questions Or Answers added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function Update(Request $request)
{
    // Find the hospital by ID
    $questions_and_answers = QuestionsAndAnswers::find($request->id);

    if (!$questions_and_answers) {
        return back()->withErrors(['error' => 'Questions Or Answers not found!']);
    }

    // Validate inputs
    $request->validate([
        'question' => 'required|string|max:1000|unique:questions_and_answers,question', // Ensure question is unique
        'answer' => 'required|string|max:5000', // Answer is required

    ], [
        'question.unique' => 'The question must be unique. Please enter a different question.',
    ]);


    try {
        // Prepare data for update
        $data = [
            'question' => $request->question,
            'answer' => $request->answer,

        ];

        // Update hospital details
        $questions_and_answers->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Questions Or Answers updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function Delete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:questions_and_answers,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $questions_and_answers = QuestionsAndAnswers::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $questions_and_answers->delete();

        // Return success response
        return back()->with('success', 'Questions Or Answers deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}

}
