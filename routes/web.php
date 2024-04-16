<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified', 'isAdmin'])
    ->name('dashboard');

Route::get('/profile', [StaffController::class,'index'])
->middleware(['auth', 'verified'])
->name('profile');

Route::resource('/admin', AdminController::class)
->middleware(['auth', 'verified', 'isAdmin']);

Route::resource('/staff', StaffController::class)
->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
