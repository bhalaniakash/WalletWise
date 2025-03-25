<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use App\Models\Income;
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
    public function boot(){
        $categories = Category::all();
        $users = User::all();
        $income = Income::all();
        $expense = Expense::all();
        View::share([
            'categories'=>$categories,
            'members'=>$users,
            'incomeReport'=>$income,
            'expenseReport'=>$expense
        ]);
    }
     
}
