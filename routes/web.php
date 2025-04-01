<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\members;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use App\Models\category;
use App\Models\Expense;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\Payment;
use App\Models\Income;
use Illuminate\Http\Request;


Route::get('/', [RegisteredUserController::class, 'create'])->name('register');

// Route::get('/dashboard', function () {

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->is_Admin === 'Yes') {
        return redirect()->route('admin.dashboard'); // Redirect to admin dashboard route
    }
    return view('dashboard.dashboard'); // Redirect to normal user dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/dashboard/category', function () {
    return view('dashboard.category');
});
Route::get('/dashboard/income', function () {
    return view('dashboard.income');
});
Route::get('/dashboard/expense', function () {
    return view('dashboard.expense');
});
Route::get('/dashboard/incomeReport', function () {
    return view('dashboard.incomeReport');
});
Route::get('/dashboard/expenseReport', function () {
    return view('dashboard.expenseReport');
});
Route::get('/dashboard/budget', function () {
    return view('dashboard.budget');
});
Route::get('/dashboard/update', function () {
    return view('dashboard.update');
});
Route::get('/dashboard/profile', function () {
    return view('dashboard.profile');
});

Route::view('admin/dashboard', 'admin.dashboard');
Route::view('admin/members', 'admin.members');


Route::get('/admin/category', function () {
    return view('admin.category');
});

Route::post('/admin/addCategory', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit'); //passing id to edit category
Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update'); //passing id to update category
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');


Route::get('/admin/showCategory', [CategoryController::class, 'index'])->name('admin.categories.index');

// user income and expense routes

Route::post('/income/store', [IncomeController::class, 'store'])->name('income.store');
Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');

Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::delete('/members/{id}', [members::class, 'destroy'])->name('members.destroy');
// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Route::get('/dashboard',[CharttController::class, 'index'])->name('dashboard');

Route::post('/budget/store', [BudgetController::class, 'store'])->name('budget.store');
Route::get('/chart-data', [ExpenseController::class, 'getExpenseIncomeChartData']);


Route::post('/income/filter', function (Request $request) {
    $filteredIncomes = Income::where('user_id', auth()->id());

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


Route::post('/expense/filter', function (Request $request) {
    $filteredexpenses = Expense::where('user_id', auth()->id());

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
            'source' => $expense->expense_name,
            'category_name' => category::find($expense->category_id)->name ?? 'Unknown',
            'paymode' => $expense->payment_method,
            'amount' => $expense->amount,
            'description' => $expense->description
        ];
    });
    // dd($data);
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

Route::post('/razorpay/payment',[Payment::class,'payment'])->name('payment');
Route::post('/verify-payment', [Payment::class, 'verifyPayment'])->name('payment.verify');