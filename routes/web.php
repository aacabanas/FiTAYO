<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\View;
use App\Http\Controllers\Logic;

Route::get('/push',[View::class,'push']);

//Routes for views
Route::get('/', [View::class,"index"]);
Route::get('/login',[View::class,"login"])->name("login_get");
Route::get("/register",[View::class,"register"])->name("register_get");
Route::get("/dashboard",[View::class,"dashboard"])->name("dashboard_get");
Route::get('/logout',[View::class,"logout"])->name("logout");
//Routes for register
Route::post("/register",[Logic::class,'register'])->name("register_post");
Route::post("/register/nonmember",[Logic::class,"register_non_member"])->name("register_non_mem");
//Routes for login
Route::post("/login",[Logic::class,'login'])->name("login_post");

//Routes for API-related stuff
Route::get("/check_in",[Logic::class,"check_in"])->name("cin");
Route::get("/check_out",[Logic::class,"check_out"])->name("cout");
Route::get("/user",[Logic::class,"get_user"]);
Route::get("/milestone/request",[Logic::class,"request_milestone_progress"])->name("milestone_request");
Route::get("/leaderboard",[Logic::class,"get_leaderboards"])->name("leaderboard");

//
//
//
//
//
