<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
    public function submitStudentData(Request $request)
    {
        $stud = new Student;
        $stud->main_id = $request['main_id'];
        $stud->parent_details = $request['parents_details'];
        $stud->save();
        echo "Success";
        return view('students');
    }
}
