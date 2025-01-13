<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class CustomerBlogController extends Controller
{
    public function All()
    {
        try {
            // Fetch blogs with their related images
            $blogs = Blog::with('images')->get();

            return view('PublicArea.Pages.Blog.index', compact('blogs'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
