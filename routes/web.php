<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;

Route::get("/", [AuthController::class, "index"])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login.POST');
Route::post('/register', [DataController::class, 'register'])->name('register.POST');
Route::get('/delete/{id}',[DataController::class,'delete'])->name('delete');
Route::get('/member/{id}', [DataController::class,'getUser']);
Route::get("/push",[AuthController::class,"push"]);
Route::post('/update/{what}/{id}',[DataController::class,'update'])->name('update.POST');