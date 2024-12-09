<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OurEvent;
use Illuminate\Http\Request;

class OurEventsController extends Controller
{
    public function index()
    {
        $our_events = OurEvent::all();
        return view('backend.our-events.index', compact('our_events'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        OurEvent::create($request->only('title', 'description'));
    
        return redirect()->back()->with('success', 'Event created successfully!');
    }
    

    public function edit($id)
    {
        $our_event = OurEvent::findOrFail($id); // Handle invalid IDs
        $our_events = OurEvent::all();
    
        return view('backend.our-events.index', compact('our_event', 'our_events'));
    }
    

    public function show($id)
{
    $our_event = OurEvent::find($id);

    if (!$our_event) {
        return redirect()->route('backend.our-events.index')->with('error', 'Event not found.');
    }

    // Pass all events and the event to show
    $our_events = OurEvent::all();
    return view('backend.our-events.index', compact('our_event', 'our_events'));
}

public function create()
{
    $our_events = OurEvent::all();
    return view('backend.our-events.index', compact('our_events'));
}


    

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $our_event = OurEvent::findOrFail($id);
    $our_event->update($request->only('title', 'description'));

    return redirect()->route('our-events.index')->with('success', 'Event updated successfully!');
}


public function destroy($id)
{
    $our_event = OurEvent::findOrFail($id); // Ensure valid ID
    $our_event->delete();

    return redirect()->route('our-events.index')->with('success', 'Event deleted successfully!');
}


}
