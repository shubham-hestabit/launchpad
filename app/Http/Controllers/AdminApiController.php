<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use Illuminate\Http\Request;
use App\Models\Main;

class AdminApiController extends Controller
{

    public function assign(Request $request, $id){

        $admin = Main::with('studentData', 'teacherData', 'assignStudent', 'assignTeacher')->find($id);

        try{
            if(is_null($admin)){
                throw new \Exception("Data not found for Updation.");
            }
            else{
                if($admin->r_id == 1){
                    $admin->approval_status = $request->approval_status ?? 0;
                    $admin->save();
                    
                    $admin->assignStudent()->insert([
                        'student_id' => $request->student_id,
                        'assigned_teacher_id' => $request->assigned_teacher_id,
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]);
                    echo "Assignation complete.\n";
                }
                else{
                    echo "Only Admin can assign the Teacher to Student and change the User Approval Status.\n";
                }
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function read($id)
    {
        $user = Assign::find($id);

        return response()->json($user); 
    }

}