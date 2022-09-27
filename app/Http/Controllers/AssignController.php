<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assign;

class AssignController extends Controller
{
    public function assignData(Request $request)
    {
        $assign = new Assign();
        date_default_timezone_set('Asia/Kolkata');
        
        $assign->a_id = session()->get('a_id');
        $assign->stud_id = session()->get('s_id');
        $assign->assigned_teacher_id = session()->get('t_id');
        $assign->save();

    }
}