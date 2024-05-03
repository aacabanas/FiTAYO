<?php

namespace App\Http\Controllers;


class view extends Controller
{
    public function index(){
        return view("index");
    }
    public function login(){  
        return view("login");
    }
    public function register(){
        return view("register");
    }
    public function update(){
        return view("update");
    }
}
