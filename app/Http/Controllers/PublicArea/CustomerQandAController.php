<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\QuestionsAndAnswers;
use Illuminate\Http\Request;

class CustomerQandAController extends Controller
{
    public function All()
    {
        try {
            // Fetch all gallery data
            $questions_and_answers = QuestionsAndAnswers::all();

            return view('PublicArea.Pages.AboutUs.index', compact('questions_and_answers'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
