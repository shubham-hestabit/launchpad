<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TeacherNotification;
use App\Models\Main;


class MailController extends Controller
{
    public function mails()
    {
        $approval_email = Main::where('approval_status', '=', 1)->get();

        $messages = [
            'title' => 'Congratulations!',
            'body' => 'You Profile is Approved by Admin.',
        ];

        foreach ($approval_email as $approved){
            Mail::to($approved)->send(new SendMail ($messages));
        }

        return "Email sent successfully.";
    }

    public function notify()
    {
        $mail = 'A new Student is assigned to you';

        // $note = [
        //     'title' => 'New Student',
        //     'body' => 'A new Student is assigned to you.',
        // ];

        Notification::route('notify', $mail)->notify(new TeacherNotification($mail));
        dd($mail);
        // return view('notify');
    }
}
