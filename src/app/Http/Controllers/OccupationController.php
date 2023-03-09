<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Occupation;

class OccupationController extends Controller
{
    public function index($id, $oc_id)
    {
        $course = Course::query()->find($id);
        $occupation = Occupation::query()->find($oc_id);
        $modules = [];
        foreach ($course->module as $relation) {
            $modules[] = $relation->module;
        }
        usort($modules, function ($x, $y) {
            return strcmp($x['number'], $y['number']);
        });
        $modules = array_reverse($modules);

        return view('hablons.occupation', compact('occupation', 'course', 'modules'));
    }
}
