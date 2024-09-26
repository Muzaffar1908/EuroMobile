<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductRequest;
use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\Shops\MainShops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index() {
        $products = Product::get();
        return view('product.index', compact('products'));
    }

    public function create() {
        $mainshop = MainShops::first();
        $categories = Category::get();
        return view('product.create', compact('mainshop', 'categories'));
    }

    public function store(ProductRequest $request) {
        $validatedData = $request->validated();

        // Retrieve `main_shop_id` and `category_id` from the request (outside the multi-input array)
        $main_shop_id = $validatedData['main_shop_id'];
        $category_id = $validatedData['category_id'];
    
        foreach ($validatedData['inputs'] as $index => $input) {
            try {
                // Create a new Product instance
                $products = new Product();
                $products->main_shop_id = $main_shop_id;
                $products->category_id = $category_id;
                $products->name = $input['name'];
                $products->valyuta = $input['valyuta'];
                $products->price = $input['price'];
                $products->count = $input['count'];
    
                // Handle file upload (image)
                if ($request->hasFile('inputs.' . $index . '.image')) {
                    // Get the file from the request
                    $image = $request->file('inputs.' . $index . '.image');
                    
                    // Generate a unique filename
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    
                    // Save the image in a directory (e.g., 'public/images/products')
                    $image->move(public_path('images/products'), $imageName);
    
                    // Save the image path in the product model
                    $products->image = $imageName;
                }
    
                // Save the product in the database
                $products->save();
          
            } catch (\Exception $e) {
                // Log the error message
                \Log::error('Product creation failed: ' . $e->getMessage());
    
                // Flash error message and redirect back with input
                Session::flash('error', 'Failed to create product!');
                return redirect()->back()->withInput()->withErrors(['msg' => 'Failed to create product.']);
            }
        }
    
        // Flash success message and redirect
        Session::flash('success', 'Product created successfully!');
        return redirect()->route('p-index');
    }

    public function edit($id) {
       $product = Product::findOrFail($id);
       $mainshop = MainShops::find($product->main_shop_id);
       $categories = Category::get();
       return view('product.edit', compact('product', 'mainshop', 'categories'));
    }
     
}
