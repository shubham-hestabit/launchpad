<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function submitTeacherData(Request $request)
    {
        $teach = new Teacher;
        date_default_timezone_set('Asia/Kolkata');
        
        $teach->user_id = $request['user_id'];
        $teach->experience = $request['experience'];
        $teach->expertise_subjects = $request['expertise_subjects'];
        $teach->save();

        session()->put('t_id', $teach->id);

        // return view('welcome');
    }
}

