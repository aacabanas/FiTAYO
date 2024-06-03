<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\ProfileController;

Route::get("/", [AuthController::class, "index"])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login.POST');
Route::post('/register', [DataController::class, 'register'])->name('register.POST');
Route::get('/delete/{id}', [DataController::class, 'delete'])->name('delete');
Route::get('/member/{id}', [DataController::class, 'getUser']);
Route::get('/updateable/{id}',[DataController::class,'getUpdatable']);
Route::get("/push", [AuthController::class, "push"]);
Route::post('/update/{what]', [DataController::class, 'update'])->name('update.POST');
Route::post('/assessment/create',[DataController::class,'create_assessment'])->name('new_assessment');
Route::get('/assessment/create',function(){abort(404);});
Route::get('/regions',[DataController::class,'get_region']);
Route::get('/cities/{region_code}',[DataController::class,'get_cities']);
Route::get('/barangays/{region_code}/{city_code}',[DataController::class,'get_barangays']);
Route::get('/phonenums',[DataController::class,'phonenums']);
Route::get('/flag/{code]',[DataController::class,'flag']);
Route::get('/qr-code', [QRController::class, 'show'])->name('qr_code_page');
Route::get('/qr/{id}',[QRController::class,'get'])->name('qr');
Route::post('/check-in',[QRController::class,'check_in'])->name('check_in');
Route::post('/check-out',[QRController::class,'check_out'])->name('check_out');
// Profile routes
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::post('/milestone/{milestone_id}/update-progress', [MilestoneController::class, 'updateProgress']);
    Route::post('/milestone/{milestone_id}/verify-advancement', [MilestoneController::class, 'verifyAdvancement']);
    Route::post('/milestone/advancement/{request_id}/confirm', [MilestoneController::class, 'confirmAdvancement'])->middleware('role:coach');
    Route::post('/milestone/advancement/{request_id}/reject', [MilestoneController::class, 'rejectAdvancement'])->middleware('role:coach');
});