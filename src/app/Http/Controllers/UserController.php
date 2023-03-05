<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request)
    {
       $data =  $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'patronymic' => 'required',
            'class' => 'required',
            'birthday' => 'required',
        ]);
       Auth::user()->update($data);
       return redirect()->route('user.index', Auth::user()->id);
    }

    public function updatePhoto(Request $request)
    {
        $data = $request->validate(['photo' => 'required'])['photo'];
        $imageSize = getimagesize($data);
        $imageData = base64_encode(file_get_contents($data));
        $imageSrc = "data:{$imageSize['mime']};base64,{$imageData}";
        Auth::user()->update(['photo' => $imageSrc]);
        return redirect()->route('user.index', Auth::user()->id);
    }
}
