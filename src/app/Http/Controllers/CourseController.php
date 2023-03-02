<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($id) {
        $course = Course::query()->find($id);
        return view('hablons.curseinfo', compact('course'));
    }
}
