<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display the service list.
     */
    public function index()
    {
        $services = Service::all(); // Fetch all services
        return view('backend.services.index', compact('services')); // Pass services to the view
    }
    
    /**
     * Store a new service.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Create the new service
        Service::create($request->all());

        // Flash success message and redirect to the service listing page
        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Update an existing service.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Find the service and update it
        $service = Service::findOrFail($id);
        $service->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        // Flash success message and redirect to the service listing page
        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }
}

