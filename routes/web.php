<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MilestoneController;

Route::get("/", [AuthController::class, "index"])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login.POST');
Route::post('/register', [DataController::class, 'register'])->name('register.POST');
Route::get('/delete/{id}', [DataController::class, 'delete'])->name('delete');
Route::get('/member/{id}', [DataController::class, 'getUser']);
Route::get("/push", [AuthController::class, "push"]);
Route::post('/update/{what}/{id}', [DataController::class, 'update'])->name('update.POST');

Route::middleware('auth')->group(function () {
    Route::post('/milestone/{milestone_id}/update-progress', [MilestoneController::class, 'updateProgress']);
    Route::post('/milestone/{milestone_id}/verify-advancement', [MilestoneController::class, 'verifyAdvancement']);
    Route::post('/milestone/advancement/{request_id}/confirm', [MilestoneController::class, 'confirmAdvancement'])->middleware('role:coach');
    Route::post('/milestone/advancement/{request_id}/reject', [MilestoneController::class, 'rejectAdvancement'])->middleware('role:coach');
});
