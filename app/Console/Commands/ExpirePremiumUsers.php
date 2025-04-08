<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class ExpirePremiumUsers extends Command
{

    protected $signature = 'expire:premium-users';
    protected $description = 'Changed plan type of user with more than 30 days of premium';

    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $expiredUsers = User::where('plan_type', 'premium')->where('premium_started_at', '<=', Carbon::now()->subDays(90))->where('is_Admin', '!=', 'Yes')->update(['plan_type' => 'regular']);
        $this->info('Revert premium users to regular if their plan has expired');
    }
}
