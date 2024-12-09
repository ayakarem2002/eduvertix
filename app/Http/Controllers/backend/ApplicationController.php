<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;
class ApplicationController extends Controller
{
    // Display the list of applications
    public function index()
    {
        $applications = Application::all();
        return view('backend.applications.index', compact('applications'));
    }

    // Show the form for creating a new application
    public function create()
    {
        return view('backend.applications.create');
    }

    // Store a newly created application
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/applications');
        } else {
            $imagePath = null;
        }

        Application::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('applications.index')->with('success', 'Application added successfully!');
    }

    // Show the form for editing an application
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        return view('backend.applications.edit', compact('application'));
    }

    // Update the application in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $application = Application::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/applications');
            $application->image = str_replace('public/', '', $imagePath);
            $application->save();
        }
        
        

        $application->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('applications.index')->with('success', 'Application updated successfully!');
    }

    // Show the details of an application
    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('backend.applications.show', compact('application'));
    }

    // Remove the application from storage
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        if ($application->image) {
            // Delete the image if exists
            Storage::delete($application->image);
        }
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully!');
    }
}
