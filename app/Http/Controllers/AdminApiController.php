<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Main;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class AdminApiController extends Controller
{

    public function assign(Request $request, $id){

        // $id = 3;
        $user = Main::with('studentData', 'teacherData', 'assignStudent', 'assignTeacher')->find($id);

        try{
            if(is_null($user)){
                throw new \Exception("Data not found for Updation.");
            }
            
            $user->approval_status = $request->approval_status ?? 0;
            $user->save();

            // if ($user->approval_status == 1){
            //     $messages = [
            //         'title' => 'Congratulations!',
            //         'body' => 'You Profile is Approved by Admin.',
            //     ];
            //     $user_email = $user->email;
            //     Mail::to($user_email)->send(new SendMail ($messages));
            //     return "Profile Approval mail sent successfully.";
            // } 

            if(auth()->user()->r_id == 1){
                    
                $user->assignStudent()->insert([
                'student_id' => $request->student_id ?? 0,
                'assigned_teacher_id' => $request->assigned_teacher_id ?? 0,
                "created_at" => now(),
                "updated_at" => now(),
                ]);

                $assign = Assign::find($id);

                $student = $assign->student_id;
                $teacher = $assign->assigned_teacher_id;
                
                // return response()->json([$student, $teacher]); 
                if ($student != 0 and $teacher != 0){

                    $messages = [
                        'title' => 'New Student',
                        'body' => 'A new Student is assigned to you.',
                    ];

                    $teacher_email = $user->email;

                    Mail::to($teacher_email)->send(new SendMail ($messages));

                    return "Profile Approval mail sent successfully.";
                }
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function read($id)
    {
        $assign = Assign::find($id);

        $student = $assign->student_id;
        $teacher = $assign->assigned_teacher_id;

        return response()->json([$student, $teacher]); 
    }

    public function mails()
    {
        $messages = [
            'title' => 'Congratulations!',
            'body' => 'You Profile is Approved by Admin.',
        ];

        Mail::to('shubhamsaini.hestabit@gmail.com')->send(new SendMail ($messages));
        return "Email sent successfully.";
    }
}