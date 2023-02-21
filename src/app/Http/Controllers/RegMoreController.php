<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegMoreStorRequest;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RegMoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('auth.moreinfo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegMoreStorRequest $request)
    {
        $data = $request->validated();
        $request->user()->update([
            'lastname' => $data['lastname'],
            'firstname' => $data['name'],
            'patronymic' => $data['patronymic'],
            'birthday' => $data['birthday'],
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user): Response
    {
        //
    }
}
