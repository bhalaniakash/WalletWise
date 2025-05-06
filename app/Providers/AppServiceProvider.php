<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // ✅ ADD THIS LINE
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Expense;
use App\Models\User;
use App\Models\Income;
use App\Models\Reminder;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   
public function boot()
{
    if (Schema::hasTable('categories') &&
        Schema::hasTable('users') &&
        Schema::hasTable('incomes') &&
        Schema::hasTable('expenses') &&
        Schema::hasTable('reminders') &&
        Schema::hasTable('contact_us')) {

        $categories = Category::all();
        $users = User::all();
        $income = Income::all();
        $expense = Expense::all();
        $reminder = Reminder::all();
        $suggestions = ContactUs::all();

        View::share([
            'categories' => $categories,
            'members' => $users,
            'incomeReport' => $income,
            'expenseReport' => $expense,
            'reminder' => $reminder,
            'suggestions' => $suggestions,
        ]);
    }
}
}
