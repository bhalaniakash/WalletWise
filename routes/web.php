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

// This is for Super Admin
Route::view('/', 'Superadmin.Home');
Route::view('/Superadmin/Feature', 'Superadmin.feature');
<<<<<<< HEAD
Route::view('/Superadmin/pricing', 'Superadmin.prici');
=======
Route::view('/Superadmin/pricing', 'Superadmin.pricing');
Route::view('/Superadmin/contactus', 'Superadmin.contactus');
Route::post('/contact/store', [ContactUsController::class, 'store'])->name('contact.store');
>>>>>>> 9fc715c40db870f265f6db651a913b3cf300bf99


// this is for user
Route::view('/dashboard/category', 'dashboard.category');
Route::view('/dashboard/income', 'dashboard.income');
Route::view('/dashboard/expense', 'dashboard.expense');
Route::view('/dashboard/incomeReport', 'dashboard.incomeReport');
Route::view('/dashboard/expenseReport', 'dashboard.expenseReport');
Route::view('/dashboard/budget', 'dashboard.budget');
Route::view('/dashboard/update', 'dashboard.update');
Route::view('/dashboard/reminder', 'dashboard.reminder');
Route::view('/dashboard/profile', 'dashboard.profile');
Route::view('/dashboard/show_reminder', 'dashboard.show_reminder');

// This is for Admin
Route::view('/admin/dashboard', 'admin.dashboard');
Route::view('/admin/members', 'admin.members');
Route::view('/admin/category', 'admin.category');
Route::view('/admin/payment', 'admin.payment');
Route::post('/admin/addCategory', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/showCategory', [CategoryController::class, 'index'])->name('admin.categories.index');

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
            'category_name' => category::find($income->category_id)->name ?? 'Unknown',
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
Route::post('/razorpay/payment', [Payment::class, 'payment'])->name('payment');
Route::post('/verify-payment', [Payment::class, 'verifyPayment'])->name('payment.verify');

//email
// Route::get('/send-email', [MailController::class, 'sendEmail']);

// Routes for Reminder
Route::post('/reminder/store', [ReminderController::class, 'store'])->name('reminder.store');
Route::get('/reminders', [ReminderController::class, 'index']);
// Route::get('/reminder/edit/{id}', [ReminderController::class, 'edit'])->name('reminder.edit');
Route::delete('/reminder/{id}', [ReminderController::class, 'destroy'])->name('reminder.destroy');
