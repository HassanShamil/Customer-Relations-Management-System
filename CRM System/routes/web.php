<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {

    // Redirecting to dashboard if already logged in
    if (auth()->check()) {
        return redirect('/dashboard');
    }

    return view('home');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::resource('customers', CustomerController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('proposals', ProposalController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('invoices', InvoiceController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/invoices/{invoice}/send', [InvoiceController::class, 'sendEmail'])->name('invoices.send');
});


Route::get('/invoices/{invoice}/pay', [InvoiceController::class, 'pay'])->name('invoices.pay');

Route::post('/invoices/{invoice}/checkout', [InvoiceController::class, 'checkout'])->name('stripe.checkout');

Route::get('/invoices/{invoice}/success', [InvoiceController::class,'paymentSuccess'])-> name('stripe.success');


Route::middleware('auth')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});

Route::get('/login', fn () => redirect('/'))->name('login');