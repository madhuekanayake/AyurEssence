<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductManagementController extends Controller
{
    public function ProductCategoryAll()
{
    try {
        // Fetch all gallery data
        $product_categories = ProductCategory::all();

        return view('AdminArea.Pages.ProductManagement.productCategory', compact('product_categories'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ProductCategoryAdd(Request $request)
    {
        // Validate input data
        $request->validate([

            'categoryName' => 'required|string|max:255|unique:product_categories,categoryName', // Ensure the category name is unique
            'description' => 'required|string|max:500', // Description should be a string
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field (with max size)
        ], [

            'categoryName.unique' => 'The category name must be unique. Please choose another name.',
        ]);


        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['productCategoryId'] = 'PM' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/productManagement/productCategory', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            ProductCategory::create($data);

            return back()->with('success', 'Product Category added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ProductCategoryUpdate(Request $request)
{
    // Find the gallery item by ID
    $product_categories = ProductCategory::find($request->id);

    // Validate inputs
    $request->validate([

        'categoryName' => 'required|string|max:255|unique:product_categories,categoryName', // Ensure the category name is unique
        'description' => 'required|string|max:500', // Description should be a string
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image field (with max size)
    ], [

        'categoryName.unique' => 'The category name must be unique. Please choose another name.',
    ]);

    try {
        $data = $request->all();

        // Handle image upload using Laravel Storage
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product_categories->image) {
                Storage ::disk('public')->delete($product_categories->image);
            }

            // Store the new image in 'uploads/images'
            $data['image'] = $request->file('image')->store('uploads/productManagement/productCategory', 'public');
        } else {
            // Retain the existing image path if no new image is uploaded
            $data['image'] = $product_categories->image;
        }

        // Update employee details
        $product_categories->update([
            'categoryName' => $data['categoryName'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);

        return redirect()->back()->with('success', 'Product Category updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ProductCategoryDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:product_categories,id',
        ]);

        // Find the student by ID
        $product_categories = ProductCategory::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($product_categories->image && file_exists(public_path('uploads/' . $product_categories->image))) {
            unlink(public_path('uploads/' . $product_categories->image));
        }

        // Delete the student record
        $product_categories->delete();

        // Return success response
        return back()->with('success', 'Product Category deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

// Controller
public function ProductAll()
{
    try {
        // Fetch products with their categories
        $products = Product::with('category')->get();
        $product_categories = ProductCategory::all();

        return view('AdminArea.Pages.ProductManagement.product', compact('products','product_categories'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}



public function ProductAdd(Request $request)
{
    // Validate input data
    $request->validate([
        'productName' => 'required|string|max:255',
        'productCategoryId' => 'required|string|exists:product_categories,productCategoryId',
        'description' => 'required|string|max:500',
    ]);

    try {
        $data = $request->all();

        // Generate a unique productId
        $data['productId'] = 'PR' . Str::random(6);

        // Save the product data
        Product::create($data);

        return back()->with('success', 'Product added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ProductUpdate(Request $request)
{
    // Find the hospital by ID
    $products = Product::find($request->id);

    if (!$products) {
        return back()->withErrors(['error' => 'Ayurveda Guide not found!']);
    }

    // Validate inputs
    $request->validate([
        'productName' => 'required|string|max:255',
        'productCategoryId' => 'required|string|exists:product_categories,productCategoryId',
        'description' => 'required|string|max:500',
    ]);


    try {
        // Prepare data for update
        $data = [
            'productName' => $request->productName,
            'productCategoryId' => $request->productCategoryId,
            'description' => $request->description,


        ];

        // Update hospital details
        $products->update($data); // Using the update method to save changes

        return redirect()->back()->with('success', 'Product updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

    public function ProductDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:products,id', // Ensure the `blogs` table and `id` column are correct
        ]);

        // Find the hospital by ID
        $products = Product::findOrFail($request->id); // Find the hospital by ID

        // Delete the hospital record
        $products->delete();

        // Return success response
        return back()->with('success', 'Product deleted successfully!');
    } catch (\Exception $e) {
        // Return error response with more descriptive message
        return back()->withErrors(['error' => 'An error occurred while deleting the blog: ' . $e->getMessage()]);
    }
}


public function ProductImageAdd(Request $request)
    {
        // Validate input data
        $request->validate([
            'productId' => 'required|exists:products,productId',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            // Generate a unique employeeId
            $data['productImageId'] = 'TI' . Str::random(6); // Random 6-character string with a prefix

            // Handle file upload using Laravel Storage
            if ($request->hasFile('image')) {
                // Get the uploaded file
                $file = $request->file('image');

                // Store the file in a specific directory and get its path
                $path = $file->store('uploads/productManagement/product', 'public');

                // Save the file path to the $data array
                $data['image'] = $path;
            }

            // Save data
            ProductImage::create($data);

            return back()->with('success', 'Image added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function ViewProductImageAll($productId)
{
    try {
        // Fetch gallery data related to the specific gardenId
        $product_images = ProductImage::where('productId', $productId)->get();

        return view('AdminArea.Pages.ProductManagement.viewProductImage', compact('product_images'));
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function ViewProductImageDelete(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:product_images,id',
        ]);

        // Find the student by ID
        $product_images = ProductImage::findOrFail($request->id);

        // Delete the associated image if it exists
        if ($product_images->image && file_exists(public_path('uploads/' . $product_images->image))) {
            unlink(public_path('uploads/' . $product_images->image));
        }

        // Delete the student record
        $product_images->delete();

        // Return success response
        return back()->with('success', 'Image deleted successfully!');
    } catch (\Exception $e) {
        // Return error response
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

public function IsPrimary($id)
{
    try {
        $item = ProductImage::findOrFail($id);

        if ($item->isPrimary == 0) {
            // Deactivate all other records
            ProductImage::where('id', '!=', $id)->update(['isPrimary' => 0]);

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

}
