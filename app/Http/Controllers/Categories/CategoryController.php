<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoryRequest;
use App\Models\Category\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index() {
      $categories = Category::get();
      return view('category.index', compact('categories'));
    }

    public function create() {
      $categories = Category::get();
      return view('category.create', compact('categories'));
    }

    public function store(CategoryRequest $request) {
      $validatedData = $request->validated();
      
      try {
        $category = new Category();
        $category->name_uz = $validatedData['name_uz'];
        $category->name_ru = $validatedData['name_ru'];
        $category->name_en = $validatedData['name_en'];
        $category->index = $validatedData['index'];

        // Assign the parent_id if it exists in the request
        if (isset($validatedData['parent_id'])) {
          $category->parent_id = $validatedData['parent_id'];
        } elseif (is_null($category->parent_id)) {
          $category->parent_id = null;
        }

        // Generate unique slug from name_uz
        $slug = \Illuminate\Support\Str::slug($validatedData['name_uz']);
        
        // Check if the generated slug already exists
        $count = Category::where('slug', $slug)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1); // Append increment if slug exists
        }
        
        $category->slug = $slug;
        
        $category->save();

        // Flash success message and redirect
        Session::flash('success', 'Category Created Successfully!');
        return redirect()->route('cat-index');
  
      } catch (\Exception $e) {
        // Log the error message
        \Log::error('Category creation failed: ' . $e->getMessage());

        // Flash error message and redirect back with input
        Session::flash('error', 'Failed to create category!');
        return redirect()->back()->withInput()->withErrors(['msg' => 'Failed to create category.']);
      }
    }

    public function edit($id) {
      $category = Category::findOrFail($id);
      $categories = Category::all();  // Get all categories for the dropdown list
      return view('category.edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category) {
      $validatedData = $request->validated();

      try {
        $category->name_uz = $validatedData['name_uz'];
        $category->name_ru = $validatedData['name_ru'];
        $category->name_en = $validatedData['name_en'];
        $category->index = $validatedData['index'];

        // Assign the parent_id if it exists in the request
        if (isset($validatedData['parent_id'])) {
          $category->parent_id = $validatedData['parent_id'];
        } elseif (is_null($category->parent_id)) {
          $category->parent_id = null;
        }

        // Generate unique slug from name_uz
        $slug = \Illuminate\Support\Str::slug($validatedData['name_uz']);
        
        // Check if the generated slug already exists
        $count = Category::where('slug', $slug)->where('id', '!=', $category->id)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1); // Append increment if slug exists
        }
        
        $category->slug = $slug;
        
        $category->save();

        // Flash success message and redirect
        Session::flash('success', 'Category Updated Successfully!');
        return redirect()->route('cat-index');
  
      } catch (\Exception $e) {
        // Log the error message
        \Log::error('Category creation failed: ' . $e->getMessage());

        // Flash error message and redirect back with input
        Session::flash('error', 'Failed to create category!');
        return redirect()->back()->withInput()->withErrors(['msg' => 'Failed to create category.']);
      }
    }

    public function delete($id) {
       $category = Category::findOrFail($id);
       if($category) {
         $category->delete();

        // Flash success message and redirect
        Session::flash('success', 'Category Deleted Successfully!');
        return redirect()->route('cat-index');

       }     
    }
  
}
