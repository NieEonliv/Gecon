<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeachingController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'teacher' || Auth::user()->role === 'admin') {
            return redirect()->route('course.teacher');
        } else {
            return view('teacher.verified');
        }
    }

    public function verified()
    {
        Auth::user()->update(['role' => 'teacher']);

        return redirect()->route('course.teacher');
    }

    public function course()
    {
        return view('teacher.course');
    }

    public function student()
    {
        return view('teacher.student');
    }

    public function lowshow($id)
    {
        $course = Course::query()->find($id);

        return view('teacher.course_controller.enter', compact('course'));
    }

    public function studentShow($id)
    {
        $user = User::query()->find($id);

        return view('teacher.course_controller.student', compact('user'));
    }

    public function studentDelete($id)
    {
        foreach (Course::query()->where(['author_id' => Auth::user()->id])->get() as $course) {
            foreach ($course->user as $relation) {
                if ($relation->user_id == $id) {
                    $relation->delete();
                }
            }
        }

        return redirect()->route('student.teacher');
    }
}
