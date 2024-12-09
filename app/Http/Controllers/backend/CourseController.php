<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all(); // Fetch all courses

        // dd($courses);
        return view('backend.courses.index', compact('courses'));
    }
    
    
    

    public function create()
    {
        return view('backend.courses.index');
    }

   // Store a new course
public function store(Request $request)
{
    $request->validate([
        'title_1' => 'required|string|max:255',
        'desc_1' => 'required|string',
        'icon_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $course = new Course();
    $course->title_1 = $request->title_1;
    $course->desc_1 = $request->desc_1;

    if ($request->hasFile('icon_1')) {
        $path = $request->file('icon_1')->store('public/icons');
        $course->icon_1 = basename($path);
    }

    $course->save();

    return redirect()->route('courses.index')->with('success', 'Course created successfully!');
}

// Update an existing course
public function update(Request $request, $id)
{
    $request->validate([
        'title_1' => 'required|string|max:255',
        'desc_1' => 'required|string',
        'icon_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $course = Course::findOrFail($id);
    $course->title_1 = $request->title_1;
    $course->desc_1 = $request->desc_1;

    if ($request->hasFile('icon_1')) {
        $path = $request->file('icon_1')->store('public/icons');
        $course->icon_1 = basename($path);
    }

    $course->save();

    return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
}

// Destroy a course
public function destroy($id)
{
    $course = Course::findOrFail($id);
    $course->delete();

    return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
}

    public function show($id)
    {
            
        $courses = Course::findOrFail($id);
        return view('backend.courses.index', compact('courses'));
    }
}
