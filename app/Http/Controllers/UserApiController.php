<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Http\Resources\UserResource;
use App\Http\Resources\StudentResource;

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
        
        return response()->json($user);
        
    }
    
    public function read($id)
    {
        $user = Main::with('studentData', 'teacherData')->find($id);

        try{
            if(is_null($user)){
                throw new \Exception("User data not found.");
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
        
        if($user->r_id == 2){
            return new UserResource($user);
        }
        elseif($user->r_id == 3){
            $stud = Main::with('studentData')->find($id);
            return new StudentResource($stud);
        }
    }

    public function update(Request $request, $id)
    {
        $user = Main::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->current_school = $request->current_school;
        $user->previous_school = $request->previous_school;
        $user->password = $request->password;
        $user->save();

        return response()->json($user);
    }
    
    public function destroy($id)
    {
        $user = Main::find($id);
        $user->delete();

        return response()->json('User Removed Successfully.');
    }
}
