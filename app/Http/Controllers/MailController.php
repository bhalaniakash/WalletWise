<?php

namespace App\Http\Controllers;

use App\Mail\reminderMail;
use App\Models\reminder;
use Exception;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;
use Mockery\Expectation;

use function Termwind\parse;

class MailController extends Controller
{
    public function sendEmail()
    {
        try {
            $users = User::where('plan_type', 'premium')->where('is_Admin', '!=', 'Yes')->get();

            foreach ($users as $user) {
                $reminders = Reminder::where('user_id', $user->id)->whereBetween('due_date', [Carbon::now(), Carbon::now()->addDays(3)])->latest()->get();

                if ($reminders->isEmpty()) {
                    Log::info("No upcoming payments within 3 days for user: " . $user->email);
                    continue; // Skip if no reminders exist
                }

                // Loop through each due payment for the user
                foreach ($reminders as $reminder) {
                    Mail::to($user->email)->send(new ReminderMail("You have a due payment on " . Carbon::parse($reminder->due_date)->format('Y-m-d'), $reminder));
                    Log::info("Email sent to " . $user->email . " for due payment on " . Carbon::parse($reminder->due_date)->format('Y-m-d'));
                }
            }
        } catch (Exception $e) {
            Log::error("Unable to send email: " . $e->getMessage());
            return "Failed to send email.";
        }
    }
}
