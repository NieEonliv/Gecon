<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'search_param' => 'required',
        ])['search_param'];
        $response = [];
        foreach (Course::all() as $course) {
            if (stristr($course->title, $data)) {
                $response[] = $course;
            }
            if (stristr($course->author->firstname.' '.$course->author->lastname, $data)) {
                $response[] = $course;
            }
        }

        return view('hablons.search', compact('response', 'data'));
    }
}
