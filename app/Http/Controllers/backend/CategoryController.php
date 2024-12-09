<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; // Ensure this model is correctly set up
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Store a new category in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $iconPath = null;

        // Handle file upload if icon is provided
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('icons', 'public');
        }

        // Create category
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $iconPath,
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    /**
     * Update an existing category.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update icon if a new file is uploaded
        if ($request->hasFile('icon')) {
            if ($category->icon) {
                // Delete the old icon from storage
                Storage::disk('public')->delete($category->icon);
            }
            $category->icon = $request->file('icon')->store('icons', 'public');
        }

        // Update other fields
        $category->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    /**
     * Remove a category from the database.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete icon file from storage
        if ($category->icon) {
            Storage::disk('public')->delete($category->icon);
        }

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
