<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the teams.
     */
    public function index()
    {
        $teams = Team::all();
        return view('backend.teams.index', compact('teams'));
    }

    /**
     * Store a newly created team in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('teams', 'public');
        }

        Team::create($data);

        return redirect()->back()->with('success', 'Team member added successfully.');
    }

    /**
     * Update the specified team in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $team = Team::findOrFail($id);
        $data = $request->all();

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }

            $data['image'] = $request->file('image')->store('teams', 'public');
        }

        $team->update($data);

        return redirect()->back()->with('success', 'Team member updated successfully.');
    }

    /**
     * Remove the specified team from storage.
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        // Delete image if exists
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();

        return redirect()->back()->with('success', 'Team member deleted successfully.');
    }
}
