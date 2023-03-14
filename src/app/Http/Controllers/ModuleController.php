<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModule;
use App\Models\Module;
use App\Models\Occupation;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModuleController extends Controller
{
    public function store($courseid)
    {
        $module = Module::query()->create([
            'title' => 'Уровень ' . $_POST['count'],
            'number' => $_POST['count'],
        ]);

        CourseModule::query()->create([
            'module_id' => $module->id,
            'course_id' => $courseid
        ]);

        return redirect('/create/' . $courseid . '/module/for/' . $module->id);
    }

    public function create($courseid, $idmodule)
    {
        $course = Course::query()->find($courseid);
        $module = Module::query()->find($idmodule);
        return view('teacher.create.create_course', compact('course', 'module'));
    }

    public function update(Request $request, $id)
    {
        $exp = $request->get('experience');
        $module = Module::query()->find($id);
        foreach ($module->occupation as $relation) {
            ($relation->occupation->update([
                'experience' => $exp
            ]));
        }
        $module->update([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
        ]);
        return redirect()->route('module.get', ['idcourse' => $module->course->course->id, 'idmodule' => $module->id]);
    }

    public function editOccupatio($id1, $id3)
    {
        $course = Course::query()->find($id1);
        $occupation = Occupation::query()->find($id3);
        return view('teacher.create.create_occupation', compact('course', 'occupation'));
    }
}
