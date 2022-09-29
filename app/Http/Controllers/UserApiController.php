<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Http\Resources\UserResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;


class UserApiController extends Controller
{

    public function create(Request $request)
    {

        $user = new Main();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->current_school = $request->current_school;
        $user->previous_school = $request->previous_school;
        $user->password = $request->password;
        $user->r_id = $request->r_id ?? '3';
        $user->save();

        if($user->r_id == 2){
            $user->teacherData()->create([
                "main_id" => $user->id,
                "experience" => $request->experience,
                "expertise_subjects" => $request->expertise_subjects,
            ]);
        }
        elseif ($user->r_id == 3){
            $user->studentData()->create([
                "main_id" => $user->id,
                "father_name" => $request->father_name,
                "mother_name" => $request->mother_name,
            ]);
        }

        // $assign = new Assign();

        // $assign->student_id = $user->s_id;
        // $assign->assigned_teacher_id = $user->assigned_teacher_id;
        
        // return response()->json($user);

        return new UserResource($user);
        
    }
    
    public function read($id)
    {
        $user = Main::with('studentData', 'teacherData')->find($id);

        try{
            if(is_null($user)){
                throw new \Exception("User data not found.");
            }
            elseif($user->r_id == 1){
                return "This ID belongs to Admin.";
            }
            elseif($user->r_id == 2){
                $teach = Main::with('teacherData')->find($id);
                return new TeacherResource($teach);
            }
            elseif($user->r_id == 3){
                $stud = Main::with('studentData')->find($id);
                return new StudentResource($stud);
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        $user = Main::with('studentData', 'teacherData')->find($id);

        
        try{
            if(is_null($user)){
                throw new \Exception("User data not found.");
            }
            else{
                $user->name = $request->name ?? $user->name;
                $user->email = $request->email ?? $user->email;
                $user->address = $request->address ?? $user->address;
                $user->current_school = $request->current_school ?? $user->current_school;
                $user->previous_school = $request->previous_school ?? $user->previous_school;
                $user->password = $request->password ?? $user->password;
                $user->save();
        
                if($user->r_id == 2){
                    $user->teacherData()->update([
                        'experience' => $request->experience ?? $user->experience,
                        'expertise_subjects' => $request->expertise_subjects ?? $user->expertise_subjects,
                    ]);
                    echo "Teacher Data Updated Successfully.";
                }
                elseif ($user->r_id == 3){
                    $user->studentData()->update([
                        "father_name" => $request->father_name ?? $user->father_name,
                        "mother_name" => $request->mother_name ?? $user->mother_name,
                    ]);
                    echo "Student Data Updated Successfully.";
                }
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }

        return response()->json($user);
    }
    
    public function destroy($id)
    {
        $user = Main::with('studentData', 'teacherData')->find($id);
        $user->delete();
        return response()->json('User Removed Successfully.');
    }
}
