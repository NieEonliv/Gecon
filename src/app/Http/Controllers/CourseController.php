<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index($id)
    {
        $course = Course::query()->find($id);
        return view('hablons.curseinfo', compact('course'));
    }

    public function enroll($id)
    {
        $course = Course::query()->find($id);
        UserCourse::query()->create([
            'user_id' => Auth::user()->id,
            'course_id' => $course->id,
            'status' => 'started',
        ]);
        $this->show($course->id);
    }

    public function show($id)
    {
        $course = Course::query()->find($id);
        $modules = [];
        foreach ($course->module as $relation) {
            $modules[] = $relation->module;
        }
        usort($modules, function ($x, $y) {
            return strcmp($x['number'],$y['number']);
        });
        $modules = array_reverse($modules);
        return view('hablons.cursegoing', compact('course', 'modules'));
    }
}
