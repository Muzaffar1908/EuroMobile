<?php

namespace App\Http\Controllers\Shops;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shops\ShopsRequest;
use App\Models\Shops\MainShops;
use App\Models\Shops\Shops;
use Illuminate\Support\Facades\Session;

class ShopsController extends Controller
{
  public function index() {
    $shops = Shops::get();
    return view('shops.index', compact('shops'));
  }

  public function create() {
    $mainshop = MainShops::first();  
    return view('shops.create', compact('mainshop'));
  }

  public function store(ShopsRequest $request) {
    // Validate the request data
    $validateData = $request->validated();

    try {
      // Create new Shop instance and save data
      $shop = new Shops();  // Make sure your model is singular
      $shop->main_shop_id = $validateData['main_shop_id'];
      $shop->name = $validateData['name'];
      $shop->save();

      // Flash success message and redirect
      Session::flash('success', 'Shop Created Successfully!');
      return redirect()->route('sh-index');

    } catch (\Exception $e) {
      // Log the error message
      \Log::error('Shop creation failed: ' . $e->getMessage());

      // Flash error message and redirect back with input
      Session::flash('error', 'Failed to create shop!');
      return redirect()->back()->withInput()->withErrors(['msg' => 'Failed to create shop.']);
    }
  }

  public function edit($id) {
    $shop = Shops::findOrFail($id);
    $mainshops = MainShops::get();
    return view('shops.edit', compact('shop', 'mainshops'));
  }

  public function update(ShopsRequest $request, $id) {
    // Validate the request data
    $validateData = $request->validated();

    try {
        // Find the shop by ID
        $shop = Shops::findOrFail($id); // Make sure your model name matches

        // Update shop data
        $shop->main_shop_id = $validateData['main_shop_id'];
        $shop->name = $validateData['name'];
        $shop->save();

        // Flash success message and redirect
        Session::flash('success', 'Shop Updated Successfully!');
        return redirect()->route('sh-index');

    } catch (\Exception $e) {
        // Log the error message
        \Log::error('Shop update failed: ' . $e->getMessage());

        // Flash error message and redirect back with input
        Session::flash('error', 'Failed to update shop!');
        return redirect()->back()->withInput()->withErrors(['msg' => 'Failed to update shop.']);
    }
}
}
