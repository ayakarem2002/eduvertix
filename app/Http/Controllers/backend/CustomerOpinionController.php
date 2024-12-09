<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomerOpinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerOpinionController extends Controller
{
    /**
     * Display a listing of the customer opinions.
     */
    public function index()
    {
        $customerOpinions = CustomerOpinion::all();

        // Pass the full URL for the images
        foreach ($customerOpinions as $opinion) {
            if ($opinion->image) {
                $opinion->image_url = Storage::url($opinion->image);
            }
        }

        return view('backend.customer-opinions.index', compact('customerOpinions'));
    }

    /**
     * Store a newly created customer opinion in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'opinion' => 'required|string',
        ]);

        // Handle image upload if exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/applications');
        }

        $customerOpinion = new CustomerOpinion();
        $customerOpinion->title = $request->title;
        $customerOpinion->description = $request->description;
        $customerOpinion->name = $request->name;
        $customerOpinion->job_title = $request->job_title;
        $customerOpinion->opinion = $request->opinion;
        $customerOpinion->image = $imagePath;  // Store image path in the database
        $customerOpinion->save();

        return redirect()->route('customer-opinions.index')->with('success', 'Customer Opinion added successfully.');
    }

    /**
     * Update the specified customer opinion in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'opinion' => 'required|string',
        ]);

        $opinion = CustomerOpinion::findOrFail($id);

        // Handle new image upload if exists
        if ($request->hasFile('image')) {
            // Delete the old image from storage if a new one is uploaded
            if ($opinion->image) {
                Storage::delete('public/' . $opinion->image);
            }

            $imagePath = $request->file('image')->store('public/opinions');
            $opinion->image = $imagePath; // Save new image path
        }

        $opinion->title = $request->title;
        $opinion->description = $request->description;
        $opinion->name = $request->name;
        $opinion->job_title = $request->job_title;
        $opinion->opinion = $request->opinion;
        $opinion->save();

        return redirect()->route('customer-opinions.index')->with('success', 'Customer Opinion updated successfully.');
    }

    /**
     * Remove the specified customer opinion from storage.
     */
    public function destroy($id)
    {
        $customerOpinion = CustomerOpinion::findOrFail($id);

        // Delete the image from storage if exists
        if ($customerOpinion->image) {
            Storage::delete('public/' . $customerOpinion->image);
        }

        $customerOpinion->delete();

        return redirect()->route('customer-opinions.index')->with('success', 'Customer Opinion deleted successfully.');
    }
}
