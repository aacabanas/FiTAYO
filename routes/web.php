<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\view;
use App\Http\Controllers\logic;

Route::get("/", [view::class,"index"])->name("index");
Route::get("/login", [view::class,"login"])->name("login");
Route::get("/register", [view::class,"register"])->name("register");
Route::get("/users",function(){return response()->json(getAllMembers());});
Route::get("/user/{id}",function($id){return response()->json(getMember($id));});
Route::get("/users/{table}",function($table){
    $data = ($table=='count')? totalMember() :getAllMembers($table);
    return response()->json($data);
});
Route::get("/member/{id}",function($id){return response()->json(getMemberDetail($id));});

Route::get("/push", [logic::class,"push"])->name("push");
Route::post("/login", [user::class,"loginPost"])->name("login.Post");
Route::post("/register", [user::class,"registerPost"])->name("register.Post");