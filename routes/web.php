<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logic;
use App\Http\Controllers\view;

Route::get("/", [view::class,"index"])->name("index");
Route::get("/login", [view::class,"login"])->name("login");
Route::get("/account", [view::class,  "account"])->name("account");
Route::get("/register", [view::class,  "register"])->name("register");
Route::get("/account", [view::class,  "account"])->name("account");

Route::get("/push", [logic::class,"push"])->name("push");
Route::post("/login", [logic::class,"loginPost"])->name("loginPost");
Route::post("/register", [logic::class,"registerPost"])->name("registerPost");