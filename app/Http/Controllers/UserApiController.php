<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class UserApiController extends Controller
{

    public function create(Request $request)
    {

        $user = new Main();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->title = $request->title;
        $user->current_school = $request->current_school;
        $user->previous_school = $request->previous_school;
        $user->password = $request->password;
        $user->r_id = $request->r_id;
        $user->save();

        if($user->r_id == 2){
            $user->teacherData()->create([
                "main_id" => $user->id,
                'experience' => $request->experience,
                'expertise_subjects' => $request->expertise_subjects,
            ]);
        }
        elseif ($user->r_id == 3){
            $user->studentData()->create([
                "main_id" => $user->id,
                "father_name" => $request->father_name,
                "mother_name" => $request->mother_name,
            ]);
        }
        
        return response()->json($user);
    }
    
    public function read($id)
    {
        $user = Main::with('studentData', 'teacherData')->find($id);
        // $user = Main::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = Main::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->title = $request->title;
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
