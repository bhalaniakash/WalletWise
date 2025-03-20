<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\ExpenseController;
use App\Models\User;
use App\Models\incomeController;
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
        $income = incomeController::all();
        $expense = ExpenseController::all();
        View::share([
            'categories'=>$categories,
            'members'=>$users,
            'incomeReport'=>$income,
            'expenseReport'=>$expense
        ]);
    }
     
}
