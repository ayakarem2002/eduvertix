<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $homePages = Homepage::all(); // Fetch all data from the database
        return view('backend.home.index', compact('homePages'));
    }

    public function update(Request $request, $id)
    {
        
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video_url' => 'nullable|url',
        ]);
    
        // Find the homepage item by ID
        $homepage = Homepage::findOrFail($id);
    
        // Update the homepage data
        $homepage->title = $request->title;
        $homepage->description = $request->description;
        
        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Store the new image and update the image path
            $imagePath = $request->file('image')->store('home_images', 'public');
            $homepage->image = $imagePath;
        }
    
        $homepage->video_url = $request->video_url;
        
        // Save the updated homepage
        $homepage->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Homepage updated successfully!');
    }
    
}
