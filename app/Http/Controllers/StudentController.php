<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
    public function submitStudentData(Request $request)
    {
        $stud = new Student;
        date_default_timezone_set('Asia/Kolkata');

        $stud->user_id = $request['user_id'];
        $stud->parent_details = $request['parents_details'];
        $stud->save();

        session()->put('s_id', $stud->id);
        echo session()->get('s_id');
        
        return view('welcome');
    }
}
