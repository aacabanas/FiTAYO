<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\user_assessment;
use App\Models\user_profile;
use App\Models\user_membership;
use App\Models\User;

Route::get("/", [AuthController::class, "index"])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/account/{id}', [AuthController::class, 'account'])->name('account');
Route::get('/count', [AuthController::class, 'count'])->name('count');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.POST');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.POST');
Route::post('/update', [AuthController::class, 'updateUser'])->name('update.POST');
Route::get('/member/{id}', [AuthController::class,'get_user']);
