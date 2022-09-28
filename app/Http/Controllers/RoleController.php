<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function submitAdminData(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|password',
        // ]);

        // $admin = new Role;
        // date_default_timezone_set('Asia/Kolkata');

        // $admin->a_name = $request['name'];
        // $admin->a_email = $request['email'];
        // $admin->a_password = $request['password'];
        // $admin->main_id = session()->get('s_user_id');
        // $admin->save();

        // session()->put('a_id', $admin->id);

        // return view('welcome');
    }
}
