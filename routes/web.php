<?php

use App\Http\Controllers\NonMemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MilestoneProgressController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get("/", [AuthController::class, "index"])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register',[AuthController::class,'register'])->name('register');
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
Route::get('/flag/{code}',[DataController::class,'flag'])->name('flags');
Route::get('/qr-code', [QRController::class, 'show'])->name('qr_code_page');
Route::get('/qr/{id}',[QRController::class,'get'])->name('qr');
Route::post('/check-in',[QRController::class,'check_in'])->name('check_in');
Route::post('/check-out',[QRController::class,'check_out'])->name('check_out');
Route::get('/test',[DataController::class,'email_test']);
// Profile routes
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
Route::get('/profile/membership', 'App\Http\Controllers\ProfileController@membership')->name('profile.membership');
Route::get('/profile/membership/change', [ProfileController::class, 'changeSubscriptionPlan'])->name('change_subscription_plan');
Route::get('/profile/policies', [ProfileController::class, 'policies'])->name('profile.policies');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
//password related
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
//for non-members
Route::post('nonmemberRegister',[NonMemberController::class,'check_in'])->name("nonmem_check_in");
//user milestones
Route::get('/request',[MilestoneProgressController::class,'request']);
Route::get('/milestones',[DataController::class,'milestones']);
Route::get('/approve/{id}',[MilestoneProgressController::class,'approve'])->name('approve');
Route::get('/reject/{id}',[MilestoneProgressController::class,'reject'])->name('reject');


Route::post("/registration/finish",[DataController::class,"fill_details"])->name('registrationFinish.POST');
// Route for forgot password form
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Route for handling the forgot password form submission
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Route for reset password form
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Route for handling the password reset form submission
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



//Route::post('/reset-password',[DataController::class,'reset_password'])->name('reset_pass');
//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/{id}',[DataController::class,'register_admin']);
Route::get('/coach/{id}',[DataController::class,'register_coach']);

Route::get("/user-paid/{plan}/{id}",[DataController::class,'user_paid']);