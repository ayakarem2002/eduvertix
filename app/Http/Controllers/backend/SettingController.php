<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all(); // Fetch all settings
        return view('backend.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('settings', 'public');
        }

        Setting::create($validated);

        return redirect()->route('backend.settings.index')->with('success', 'Setting added successfully.');
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $validated = $request->validate([
            'icon' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('settings', 'public');
        }

        $setting->update($validated);

        return redirect()->route('backend.settings.index')->with('success', 'Setting updated successfully.');
    }

    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('backend.settings.index')->with('success', 'Setting deleted successfully.');
    }
}
