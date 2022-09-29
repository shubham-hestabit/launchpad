<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentApiController extends Controller
{
    
    public function create(Request $request)
    {

        $stud = new Student();

        $stud->main_id = $request['user_id'];
        $stud->parent_details = $request['parents_details'];
        $stud->save();

        // session()->put('s_id', $stud->id);

        return response()->json($stud);
    }
    
    public function read($id)
    {
        $stud = Student::find($id);

        return response()->json($stud);
    }

    public function update(Request $request, $id)
    {
        $stud = Student::find($id);
        // $stud->parent_details = $request['parents_details'];
        $stud->save();

        return response()->json($stud);
    }
    
    public function destroy($id)
    {
        $stud = Student::find($id);
        $stud->delete();

        return response()->json('Student Removed Successfully.');
    }
}
