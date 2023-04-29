<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Mail;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder Email For User to check there Store.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $userReminder = user::select('email')->get();
        $emails = [];
        foreach($userReminder as $mail)
        {
            $emails[] = $mail['email'];
        }

        Mail::send('reminder.reminder', [],function($message) use ($emails)
        {
            $message->to($emails)->subject('Reminder Email');
        });
    }
}
