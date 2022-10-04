<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Main;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $count = Main::where('approval_status', '=', 0)->count();

            $admins = Main::where('r_id','=', 1)->get();

            $messages = [
                'title' => 'Approval Pending...',
                'body' => 'Please Approved remaining Profiles.',
                'count' => 'Unapproved Profile: '.$count,
            ];
            foreach ($admins as $admin) {
                $email = $admin->email;
                Mail::to($email)->send(new SendMail ($messages));
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
