<?php

namespace App\Http\Controllers;

use App\Http\Requests\LowCourseRequest;
use App\Models\Course;
use App\Models\UserCourse;
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

        return redirect()->route('course.show', $course->id);
    }

    public function show($id)
    {
        $course = Course::query()->find($id);
        $modules = [];
        foreach ($course->module as $relation) {
            $modules[] = $relation->module;
        }
        usort($modules, function ($x, $y) {
            return strcmp($x['number'], $y['number']);
        });
        $modules = array_reverse($modules);

        return view('hablons.cursegoing', compact('course', 'modules'));
    }

    public function destroy($id)
    {
        $course = Course::query()->find($id);
        abort_if(Auth::user()->id != $course->author_id, 403);
        $course->delete();

        return redirect()->route('course.teacher');
    }

    public function updatelow(LowCourseRequest $request, $id)
    {
        $course = Course::query()->find($id);
        abort_if(Auth::user()->id != $course->author_id, 403);
        $course->update($request->validated());

        return redirect()->route('edit.course', $course->id);
    }

    public function edit($id)
    {
        $course = Course::query()->find($id);
        abort_if(Auth::user()->id != $course->author_id, 403);

        return view('teacher.course_controller.edit', compact('course'));
    }
}
