<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pages\DashboardController;
use App\Http\Controllers\Pages\DocumentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',[UserController::class,'index']);
// Route::get('/create',[UserController::class,'create']);
// Route::post('/create',[UserController::class,'created']);
// Route::get('/edit/{id}',[UserController::class,'edit']);
// Route::post('/edit/{id}',[UserController::class,'edited']);
// Route::get('/delete/{id}',[UserController::class,'delete']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registered'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware('admin')->group(function () {
    Route::resource('document', DocumentController::class)->names('document');
});
