<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
      $categories = Category::get();
      return view('category.index', compact('categories'));
    }

    public function create() {
      return view('category.create');
    }
}
