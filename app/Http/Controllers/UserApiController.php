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

        if($user->r_id == 1){
            echo "New Admin Added Successfully.\n";
        }
        elseif($user->r_id == 2){
            $user->teacherData()->create([
                "main_id" => $user->id,
                "experience" => $request->experience,
                "expertise_subjects" => $request->expertise_subjects,
            ]);
            echo "New Teacher Data Added Successfully.\n";
        }
        elseif ($user->r_id == 3){
            $user->studentData()->create([
                "main_id" => $user->id,
                "father_name" => $request->father_name,
                "mother_name" => $request->mother_name,
            ]);
            echo "New Student Data Added Successfully.\n";
        }

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
                echo "You are viewing Teacher Data.\n";
                return new TeacherResource($teach);
            }
            elseif($user->r_id == 3){
                $stud = Main::with('studentData')->find($id);
                echo "You are viewing Student Data.\n";
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
                throw new \Exception("User data not found for Updation.");
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
                    $teach = Main::with('teacherData')->find($id);
                    echo "Teacher Data Updated Successfully.\n";
                    return new TeacherResource($teach); 
                }
                elseif ($user->r_id == 3){
                    $user->studentData()->update([
                        "father_name" => $request->father_name ?? $user->father_name,
                        "mother_name" => $request->mother_name ?? $user->mother_name,
                    ]);
                    $stud = Main::with('studentData')->find($id);
                    echo "Student Data Updated Successfully.\n";
                    return new StudentResource($stud);
                }
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function destroy($id)
    {
        $user = Main::with('studentData', 'teacherData')->find($id);

        try{
            if(is_null($user)){
                throw new \Exception("User data not found for Deletion.");
            }
            else if($user->r_id == 2){
                echo "Teacher Data Deleted Successfully.\n";
                $user->delete();
            }
            elseif ($user->r_id == 3){
                echo "Student Data Deleted Successfully.\n";
                $user->delete();
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
        // return response()->json();
    }
}
