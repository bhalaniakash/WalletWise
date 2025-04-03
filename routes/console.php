<?php

use App\Console\Commands\ExpirePremiumUsers;
use App\Console\Commands\SendReminder;
use App\Console\Commands\sendReminderEmails;
use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    /** @var ClosureCommand $this */
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command(ExpirePremiumUsers::class)->daily();
Schedule::command(SendReminder::class)->daily();
