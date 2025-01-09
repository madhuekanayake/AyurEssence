<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        try {
            // Fetch all gallery data
            $blogs = Blog::all();

            return view('PublicArea.Pages.Blog.index', compact('blogs'));


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

//     public function All()
// {
//     try {
//         // Fetch all gallery data
//         $blogs = Blog::all();

//         return view('PublicArea.Pages.Blog.index', compact('blogs'));


//     } catch (\Exception $e) {
//         // Handle any errors that occur
//         return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
//     }
// }
}
