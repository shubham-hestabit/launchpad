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
        
        $teach->main_id = $request['main_id'];
        $teach->experience = $request['experience'];
        $teach->expertise_subjects = $request['expertise_subjects'];
        $teach->save();

        return view('welcome');
    }
}
