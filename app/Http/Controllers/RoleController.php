<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function userRole(Request $request)
    {

        $role = new Role();
        
        // $role->id = $request->get('r_id');

        session()->put('r_id', $role->id);

        echo session()->get('r_id');

        // return view('welcome');
    }
}
