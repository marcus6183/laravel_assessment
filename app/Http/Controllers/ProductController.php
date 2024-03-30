<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        // Get all products
        $products = Product::all();

        // Render the 'product.home' view, passing the retrieved products to the view
        return view('product.home', ['products' => $products]);
    }

    public function search(Request $request)
    {
        // Get the search parameter
        $search = $request->search;

        // Check if search keyword is empty
        if (empty($search)) {
            // Redirect user to the home route (Showing all products)
            return redirect()->route('product.home');
        }

        // Retrieve products where the name or details column matches the search query
        $products = Product::where(
            function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere("details", "like", "%$search%");
            }
        )->get();

        // Render the 'product.home' view, passing the retrieved products to the view
        return view('product.home', ['products' => $products]);
    }

    public function showCreate()
    {
        // Render the 'product.create' view
        return view('product.create');
    }

    public function createProduct(Request $request)
    {
        // Get request data
        $inputs = $request->all();

        // Map publish data to Boolean
        $inputs['publish'] = $inputs['publish'] === 'yes' ? true : false;

        try {
            // Save to database
            Product::create($inputs);

            // Show success toast
            toastr()->success('Product created', 'Success');

            // Redirect user back to home page
            return redirect()->route('product.home');

        } catch (\Exception $e) {
            // Show error toast when failed
            toastr()->error('Failed to create product', 'Error');
        }
    }

    public function showProduct(Product $product)
    {
        // Render the 'product.show' view to display the details of a specific product
        return view('product.show', ['product' => $product]);
    }

    public function showEditProduct(Product $product)
    {
        // Render the 'product.edit' view to edit the details of a specific product
        return view('product.edit', ['product' => $product]);
    }

    public function editProduct(Product $product, Request $request)
    {
        // Get request data
        $inputs = $request->all();

        // Map publish data to Boolean
        $inputs['publish'] = $inputs['publish'] === 'yes' ? true : false;

        // Update the product
        $result = $product->update($inputs);

        // Check update operation status
        if ($result) {
            toastr()->success('Product updated', 'Success');
        } else {
            toastr()->error('Update failed', 'Error');
        }

        // Redirect user back to home page
        return redirect()->route('product.home');
    }

    public function deleteProduct(Product $product)
    {
        // Delete the product
        $result = $product->delete();

        // Check delete operation status
        if ($result) {
            toastr()->success('Product deleted', 'Success');
        } else {
            toastr()->error('Delete operation failed', 'Error');
        }

        // Redirect user back to home page
        return redirect()->route('product.home');
    }
}
