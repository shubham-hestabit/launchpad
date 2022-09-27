<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class MainController extends Controller
{

    public function submitUserData(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'current_school' => 'required',
            'previous_school' => 'required',
            'password' => 'required',
        ]);

        $user = new Main();
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->title = $request->title;
        
        date_default_timezone_set('Asia/Kolkata');
        if($user->title == 'student'){
            $filename = 'student - '.date("d-m-Y h:i:sa",time()).'.'.$request->file('picture')->getClientOriginalExtension();
            $user->profile_picture = $request->file('picture')->storeAs('student-pictures', $filename);
        }
        else{
            $filename = 'teacher - '.date("d-m-Y h:i:sa",time()).'.'.$request->file('picture')->getClientOriginalExtension();
            $user->profile_picture = $request->file('picture')->storeAs('teachers-pictures', $filename);
        }

        $user->current_school = $request->current_school;
        $user->previous_school = $request->previous_school;
        $user->password = $request->password;
        $user->save();
        
        if($user->title == 'student'){
            session()->put('s_user_id', $user->id);
            return redirect('student-form');
        }
        else{
            session()->put('t_user_id', $user->id);
            return redirect('teacher-form');
        }
    }

    public function loginUser(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $email = $request->email;
        $pass = $request->password;
        $c_pass = $request->confirm_password;
        
        if ((Main::where('email', '=', $email)->exists()) and (Main::where('password', '=', $pass)->exists())){
            return redirect('user-data');
        }
        else{
            return view('user_login')->with('error', '<h1>User Data Not Found in Database.<h1>');
        }
    }
}
