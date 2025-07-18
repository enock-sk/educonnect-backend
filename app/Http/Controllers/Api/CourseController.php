<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index()
    {
        return Course::paginate(10);
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return response()->json($course);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_id' => 'required|exists:users,id',
            'status' => 'required|in:active,inactive',
        ]);

        $course = Course::create($validated);

        return response()->json($course, 201);
    }
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'instructor_id' => 'sometimes|required|exists:users,id',
            'status' => 'sometimes|required|in:active,inactive',
        ]);

        $course->update($validated);

        return response()->json($course);
    }
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json(['message' => 'Course deleted successfully']);
    }

}
