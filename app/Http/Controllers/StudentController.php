<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
    public function submitStudentData(Request $request)
    {
        $stud = new Student;
        $stud->main_id = $request['main_id'];
        $stud->parent_details = $request['parents_details'];
        date_default_timezone_set('Asia/Kolkata');
        $stud->save();

        return view('welcome');
    }
}
