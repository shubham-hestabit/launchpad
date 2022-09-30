<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Http\Resources\AssignResource;

class AdminApiController extends Controller
{

    // public function assign(Request $request, $id){

    //     $admin = Main::with('studentData', 'teacherData', 'assignStudent', 'assignTeacher')->find($id);

    //     try{
    //         if(is_null($admin)){
    //             throw new \Exception("Data not found for Updation.");
    //         }
    //         else{
    //             if($admin->r_id == 1){
    //                 $admin->approval_status = $request->approval_status ?? $admin->approval_status;
    //                 $admin->save();

    //                 $admin->teacherData()->assignTeacher()->update([
    //                     'assigned_teacher_id' => $request->teacherData->assignTeacher->assigned_teacher_id ?? 
    //                     $admin->teacherData->assignTeacher->assigned_teacher_id,
    //                 ]);
    //                 echo "Teacher Assigned to Student Successfully.\n";

    //                 $admin->studentData()->assignStudent()->update([
    //                     'student_id' => $request->studentData->assignStudent->student_id ?? 
    //                     $admin->studentData->assignStudent->student_id,
    //                 ]);
    //                 echo "Student added in Teacher List of Student.\n";
    //             }
    //         }
    //     }
    //     catch(\Exception $e){
    //         echo $e->getMessage();
    //     }
    //     return new AssignResource($admin); 
    // }

    public function read($id)
    {
        $user = Main::find($id);

        return response()->json($user); 
    }

}
