<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Members;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\contactUs as ControllersContactUs;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Payment;
use App\Http\Controllers\ReminderController;
use App\Models\Category;
use App\Models\contactUs;
use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', [RegisteredUserController::class, 'create'])->name('register');

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->is_Admin === 'Yes') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::view('/', 'Superadmin.Home');
// This is for Super Admin
Route::prefix('/Superadmin')->group(function () {
    Route::view('/Home', 'Superadmin.Home');
    Route::view('/login', 'Superadmin.login');
    Route::view('/register', 'Superadmin.register');
    Route::view('/forgot_password', 'Superadmin.forgot_password');
    Route::view('/reset_password', 'Superadmin.reset_password');
    Route::view('/terms_conditions', 'Superadmin.terms_conditions');
    Route::view('/privacy_policy', 'Superadmin.privacy_policy');
    Route::view('/nav', 'Superadmin.nav');
    Route::view('/Feature', 'Superadmin.feature');
    Route::view('/pricing', 'Superadmin.pricing');
    Route::view('/contactus', 'Superadmin.contactus');
    Route::view('/about_us', 'Superadmin.about_us');
    // Route::view('/CTA', 'Superadmin.CTA');
});
Route::post('/contact/store', [ContactUsController::class, 'store'])->name('contact.store');


// this is for user
Route::prefix('/dashboard')->group(function () {
    Route::view('/category', 'dashboard.category');
    Route::view('/income', 'dashboard.income');
    Route::view('/expense', 'dashboard.expense');
    Route::view('/incomeReport', 'dashboard.incomeReport');
    Route::view('/expenseReport', 'dashboard.expenseReport');
    Route::view('/budget', 'dashboard.budget');
    Route::view('/update', 'dashboard.update');
    Route::view('/reminder', 'dashboard.reminder');
    Route::view('/profile', 'dashboard.profile');
    Route::view('/show_reminder', 'dashboard.show_reminder');
});


// This is for Admin
Route::prefix('/admin')->group(function () {

    Route::view('/dashboard', 'admin.dashboard');
    Route::view('/members', 'admin.members');
    Route::view('/suggestions', 'admin.suggestions');
    Route::view('/category', 'admin.category');
    Route::view('/payment', 'admin.payment');
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('admin.category');
        Route::post('/category/store', 'store')->name('admin.category.store');
        Route::get('/category/edit/{id}', 'edit')->name('admin.category.edit');
        Route::put('/category/update/{id}', 'update')->name('admin.category.update');
        Route::delete('/category/{id}', 'destroy')->name('admin.category.destroy');
    });

    Route::get('/payment', function (Request $request) {
        $filteredUsers = User::where('plan_type', 'premium')
            ->where('is_Admin', 'No');

        if ($request->filled('date')) {
            $filteredUsers->whereYear('premium_started_at', substr($request->input('date'), 0, 4))
                ->whereMonth('premium_started_at', substr($request->input('date'), 5, 2));
        }

        $data = $filteredUsers->get();
        $totalPremiumPayment = number_format($data->sum('premium_amount'), 2, '.', '');

        return view('admin.payment', compact('data', 'totalPremiumPayment'));
    })->name('payment.filter');
});
// User income and expense routes
Route::post('/income/store', [IncomeController::class, 'store'])->name('income.store');
Route::get('/chart-data', [ExpenseController::class, 'getExpenseIncomeChartData']);
Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::delete('/members/{id}', [Members::class, 'destroy'])->name('members.destroy');
// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::post('/budget/store', [BudgetController::class, 'store'])->name('budget.store');

Route::post('/income/filter', function (Request $request) {
    $filteredIncomes = Income::where('user_id', Auth::id());

    if ($request->filled('date')) {
        $filteredIncomes->whereYear('date', substr($request->input('date'), 0, 4))
            ->whereMonth('date', substr($request->input('date'), 5, 2));
    }

    if ($request->filled('icat')) {
        $filteredIncomes->where('category_id', $request->input('icat'));
    }

    $data = $filteredIncomes->get()->map(function ($income) {
        return [
            'date' => $income->date,
            'source' => $income->source,
            'category_name' => Category::find($income->category_id)->name ?? 'Unknown',
            'amount' => $income->amount,
            'description' => $income->description
        ];
    });

    return response()->json($data);
});


Route::post('/expenses/filter', function (Request $request) {
    $filteredexpenses = Expense::where('user_id', Auth::id());

    if ($request->filled('date')) {
        $filteredexpenses->whereYear('date', substr($request->input('date'), 0, 4))
            ->whereMonth('date', substr($request->input('date'), 5, 2));
    }

    if ($request->filled('ecat')) {
        $filteredexpenses->where('category_id', $request->input('ecat'));
    }
    $data = $filteredexpenses->get()->map(function ($expense) {
        return [
            'date' => $expense->date,
            'source' => $expense->source,
            'category_name' => Category::find($expense->category_id)->name ?? 'Unknown',
            'paymode' => $expense->payment_method,
            'amount' => $expense->amount,
            'description' => $expense->description
        ];
    });
    dd($data);
    return response()->json($data);
});

Route::post('/category/filter', function (Request $request) {
    $category = category::query();
    if ($request->filled('cat')) {
        $category->where('type', $request->input('cat'));
    }
    $data = $category->get()->map(function ($category) {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'type' => $category->type,
        ];
    });
    // dd($data);
    return response()->json($data);
});




//payment
Route::controller(Payment::class)->group(function () {
    Route::post('/razorpay/payment',  'payment')->name('payment');
    Route::post('/verify-payment',  'verifyPayment')->name('payment.verify');
});

//email
// Route::get('/send-email', [MailController::class, 'sendEmail']);

// Routes for Reminder
Route::post('/reminder/store', [ReminderController::class, 'store'])->name('reminder.store');
Route::get('/reminders', [ReminderController::class, 'index']);
// Route::get('/reminder/edit/{id}', [ReminderController::class, 'edit'])->name('reminder.edit');
Route::delete('/reminder/{id}', [ReminderController::class, 'destroy'])->name('reminder.destroy');
