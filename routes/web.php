<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[UserController::class,'index']);
Route::get('/create',[UserController::class,'create']);
Route::post('/create',[UserController::class,'created']);
