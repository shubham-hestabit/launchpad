<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function submitAdminData(Request $request)
    {
        $admin = new Admin;
        date_default_timezone_set('Asia/Kolkata');

        $admin->a_name = $request['name'];
        $admin->a_email = $request['email'];
        $admin->a_password = $request['password'];
        $admin->main_id = $request['main_id'];
        // $admin->approval_status = $request['approval_status'];
        $admin->save();

        return view('welcome');
    }
}

// a_id	bigint unsigned Auto Increment	
// a_name	varchar(100)	
// a_email	varchar(150)	
// a_password	varchar(50)	
// main_id	bigint unsigned	
// approval_status	int	
// created_at	timestamp NULL	
// updated_at