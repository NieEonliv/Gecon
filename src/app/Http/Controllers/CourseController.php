<?php

namespace App\Http\Controllers;

use App\Http\Requests\LowCourseRequest;
use App\Models\Course;
use App\Models\UserCourse;
use App\Service\ConstantService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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

    public function searchCourseTeaching()
    {
        $data = $_POST['search_param'];
        $courseOrig = Course::query()->where(['author_id' => Auth::user()->id])->get();

        $courses = [];
        foreach ($courseOrig as $course) {
            if (stristr($course->title, $data)) {
                $courses[] = $course;
            }
            if (stristr($course->description, $data)) {
                $courses[] = $course;
            }
        }

        return view('teacher.course_controller.search.course', compact('courses', 'data'));
    }

    public function searchStudentTeaching()
    {
        $data = $_POST['search_param'];

        $sudents = [];
        foreach (Course::query()->where(['author_id' => Auth::user()->id])->get() as $course) {
            foreach ($course->user as $relation) {
                $fio = $relation->user->firstname . ' ' . $relation->user->lastname . ' ' . $relation->user->patronymic;
                if (stristr($fio, $data)) {
                    $sudents[] = $relation->user;
                }
            }
        }

        return view('teacher.course_controller.search.student', compact('sudents', 'data'));
    }

    public function get_create()
    {
        return view('teacher.create.enter');
    }

    public function store()
    {
        $data  = $_POST;
        unset($data['_token']);
        $data['image'] = ConstantService::IMAGES_COURSE[random_int(0,14)];
        $data['author_id'] = Auth::user()->id;
        $course =   Course::query()->create($data);

        return redirect()->route('edit.course', $course->id);
    }
}
