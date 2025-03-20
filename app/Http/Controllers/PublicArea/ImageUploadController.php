<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ImageUploadController extends Controller
{
    public function All()
    {
        try {
            return view('PublicArea.Pages.PlantsIdentification.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function uploadAndPredict(Request $request)
{
    try {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Save the uploaded image temporarily
        $imagePath = $request->file('image')->store('uploads', 'public');

        // Send the image to the Python API
        $client = new Client();
        $response = $client->post('http://localhost:5000/predict', [
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen(storage_path('app/public/' . $imagePath), 'r'),
                    'filename' => 'uploaded_image.jpg',
                ],
            ],
        ]);

        // Decode the response
        $result = json_decode($response->getBody(), true);

        // Check if the prediction was successful
        if (isset($result['prediction'])) {
            // Pass the image path and prediction result to the view
            return back()
                ->with('success', 'Prediction: ' . $result['prediction'])
                ->with('image', $imagePath); // Pass the image path to the view
        } else {
            return back()->withErrors(['error' => 'Prediction failed: ' . ($result['error'] ?? 'Unknown error')]);
        }

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

}
