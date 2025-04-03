<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Http\Controllers\MailController;

class SendReminder extends Command
{
    // Define the command signature
    protected $signature = 'email:send-premium';

    // Description for the command
    protected $description = 'Send email to users with premium plan_type';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $premiumUsers = User::where('plan_type', 'premium')->where('is_Admin', '!=', 'Yes')->get();
        if ($premiumUsers->isEmpty()) {
            $this->info('No premium users found.');
            return;
        }
        $mailController = new MailController();
        // dump($mailController);
        foreach ($premiumUsers as $user) {
            $mailController->sendEmail();
            // dd('pp');
            $this->info("Email sent to: {$user->email}");
        }

        $this->info('Emails sent successfully to all premium users.');
    }
}
