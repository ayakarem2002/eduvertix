<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUsEntries = AboutUs::all();
        return view('backend.about.index', compact('aboutUsEntries'));
    }
    

    public function edit($id)
    {
        $entry = AboutUs::findOrFail($id);
        return view('backend.about.edit', compact('entry'));
    }

    public function update(Request $request, $id)
    {
        $entry = AboutUs::findOrFail($id);
    
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_1' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'video_1' => 'nullable|url',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image_1')) {
            $imagePath = $request->file('image_1')->store('about_us', 'public');
            $entry->image_1 = $imagePath;
        }
        
    
        // Handle the second image
        if ($request->hasFile('image_2')) {
            $imagePath = $request->file('image_2')->store('about_us', 'public');
            $entry->image_1 = $imagePath;
        }
        
    
        // Update other fields
        $entry->update($request->except(['image_1', 'image_2']));
    
        return redirect()->route('backend.about.index')->with('success', 'Entry updated successfully!');
    }
    
}
