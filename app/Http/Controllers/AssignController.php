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
        
        // $assign->r_id = $request->r
        $assign->student_id = session()->get('s_id');
        $assign->assigned_teacher_id = session()->get('t_id');
        $assign->save();

    }
}