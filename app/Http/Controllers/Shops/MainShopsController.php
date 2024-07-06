<?php

namespace App\Http\Controllers\Shops;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shops\MainShopsRequest;
use App\Models\Shops\MainShops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainShopsController extends Controller
{
    public function index() {
       $mainshops = MainShops::first();
       return view('mainshops.index', compact('mainshops'));
    }

    public function store(MainShopsRequest $request) {
        $validatedData = $request->validated();

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('/public/uploads/'), $filename);
            $validatedData['image'] = '/public/uploads/' . $filename;
        }
    
        // Create new MainShop instance and save data
        $mainShops = new MainShops();
        $mainShops->name = $validatedData['name'];
        $mainShops->image = $validatedData['image'] ?? '/public/uploads/default_shop.jpeg'; // Use null if image not uploaded
        $mainShops->save();
    
        // Flash success message and redirect
        Session::flash('success', 'Main Shop Created Successfully!');
        return redirect()->route('m-index');
    }

    public function edit($id) {
      $mainshops = MainShops::findOrFail($id);
      return view('mainshops.index', compact('mainshops'));
    } 

    public function update(MainShopsRequest $request, MainShops $mainShop) {
        $validatedData = $request->validated();

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('/public/uploads/'), $filename);
            $validatedData['image'] = '/public/uploads/' . $filename;
            
            // Delete old image if it exists
            if ($mainShop->image) {
                unlink(public_path($mainShop->image));
            }
        }

        // Update MainShop instance with validated data
        $mainShop->name = $validatedData['name'];
        $mainShop->image = $validatedData['image'] ?? $mainShop->image; // Keep old image if new one not uploaded
        $mainShop->save();

        // Flash success message and redirect
        Session::flash('success', 'Main Shop Updated Successfully!');
        return redirect()->route('m-index');
    }
}
