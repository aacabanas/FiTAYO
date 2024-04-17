<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/register',function(){
    return view('register');
});
Route::get('/account',function(){
    return view('account');
});