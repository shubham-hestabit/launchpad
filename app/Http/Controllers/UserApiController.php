<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Http\Resources\UserResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;

class UserApiController extends Controller
{
    // Registeration Method
    public function create(Request $request)
    {

        $user = new Main();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->current_school = $request->current_school;
        $user->previous_school = $request->previous_school;
        $user->password = bcrypt($request->password);
        $user->r_id = $request->r_id ?? 3;
        $user->approval_status = 0;
        $user->save();

        if($user->r_id == 1){
            $user->approval_status = 1;
            $user->save();
        }
        elseif($user->r_id == 2){
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

        $token = $user->createToken('Token')->accessToken;
        $user_data =  new UserResource($user);
        return response()->json(['token'=>$token, 'user' => $user_data]);
        
    }
    
    //Login Method
    public function login(Request $request){

        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];
       
        if (auth()->attempt($user)){

            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json(['token'=>$token]);
   
        }
        else{            
            return response()->json(['Error'=>'Unauthorized User']);
        }
    }

    //Logout Method
    public function logout()
    {
        auth()->user()->token()->revoke();
        return response()->json([
            'message' => 'User logged out successfully.'
        ]);
    }
    
    // Reading Method
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
                return new TeacherResource($user);
            }
            elseif($user->r_id == 3){
                return new StudentResource($user);
            }
        }
        catch(\Exception $e){
            return response()->json(["Error" => $e->getMessage()]);
        }
    }

    // Updation Method
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
                $user->password = bcrypt($request->password) ?? $user->password;
                $user->save();
        
                if($user->r_id == 2){
                    $user->teacherData()->update([
                        'experience' => $request->experience ?? $user->experience,
                        'expertise_subjects' => $request->expertise_subjects ?? $user->expertise_subjects,
                    ]);
                    return new TeacherResource($user); 
                }
                elseif ($user->r_id == 3){
                    $user->studentData()->update([
                        "father_name" => $request->father_name ?? $user->father_name,
                        "mother_name" => $request->mother_name ?? $user->mother_name,
                    ]);
                    return new StudentResource($user);
                }
            }
        }
        catch(\Exception $e){
            return response()->json(["Error" => $e->getMessage()]);
        }
    }
    
    // Deletion Method
    public function destroy($id)
    {
        if (auth()->user()->r_id == 1){
            $user = Main::find($id);
            $user->delete();
            return response()->json(['message' => 'User deleted successfully.']);    
        }else{
            return response()->json(['message' => 'Unauthorized User']);
        }
    }
}
