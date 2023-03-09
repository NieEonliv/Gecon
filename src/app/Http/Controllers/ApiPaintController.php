<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiPaintController extends Controller
{
    public static function index()
    {
        $data = Http::post('https://randomall.ru/api/gens/278', []);
        dd($data);
    }
}
