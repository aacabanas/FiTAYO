<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fitayo;

Route::get("/", [fitayo::class,"index"])->name("index");
Route::get("/login", [fitayo::class,"login"])->name("login");
Route::get("/account", [fitayo::class,  "account"])->name("account");
Route::get("/register", [fitayo::class,  "register"])->name("register");


Route::post("/login", [fitayo::class,"loginPost"])->name("loginPost");
Route::post("/register", [fitayo::class,"registerPost"])->name("registerPost");