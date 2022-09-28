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
