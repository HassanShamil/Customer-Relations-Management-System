<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\DashboardController;

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
