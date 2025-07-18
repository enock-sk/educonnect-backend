<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function enroll($id)
    {
        $user = auth()->user();

        $course = Course::findOrFail($id);
        $exists = Enrollment::where('user_id', $user->id)->where('course_id', $id)->exists();

        if ($exists) {
            return response()->json(['message' => 'Already enrolled'], 400);
        }

        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $id,
            'progress_percentage' => 0,
            'enrolled_at' => now()
        ]);

        return response()->json(['message' => 'Enrolled successfully']);
    }
    public function unenroll($id)
    {
        $user = auth()->user();
        $enrollment = Enrollment::where('user_id', $user->id)->where('course_id', $id)->first();

        if (!$enrollment) {
            return response()->json(['message' => 'Not enrolled in this course'], 400);
        }

        $enrollment->delete();

        return response()->json(['message' => 'Unenrolled successfully']);
    }

    public function myCourses()
    {
        return auth()->user()->enrollments()->with('course')->get();
    }


}
