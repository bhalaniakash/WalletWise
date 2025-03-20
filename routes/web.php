<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\members;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CharttController;
use App\Http\Controllers\UpdateCategory;

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

require __DIR__.'/auth.php';

Route::get('/dashboard/category',function(){
    return view('dashboard.category');
});
Route::get('/dashboard/income',function(){
    return view('dashboard.income');
});
Route::get('/dashboard/expense',function(){
    return view('dashboard.expense');
});
Route::get('/dashboard/incomeReport',function(){
    return view('dashboard.incomeReport');
});
Route::get('/dashboard/expenseReport',function(){
    return view('dashboard.expenseReport');
});
Route::get('/dashboard/savingReport',function(){
    return view('dashboard.savingReport');
});
Route::get('/dashboard/profile',function(){
    return view('dashboard.profile');
});

Route::view('admin/dashboard','admin.dashboard');
Route::view('admin/members','admin.members');


Route::get('/admin/category',function(){
    return view('admin.category');
});

Route::post('/admin/addCategory', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

Route::get('/admin/showCategory', [CategoryController::class, 'index'])->name('admin.categories.index');

// user income and expense routes

Route::post('/income/store', [IncomeController::class, 'store'])->name('income.store');
Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');

Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::delete('/members/{id}', [members::class, 'destroy'])->name('members.destroy');
// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Route::get('/dashboard',[CharttController::class, 'index'])->name('dashboard');

Route::put('/update/{id}', [UpdateCategory::class, 'edit'])->name('update');
