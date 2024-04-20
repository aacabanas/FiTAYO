<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class fitayo extends Controller
{
    //routing
    public function index(){
        return view("index");
    }
    public function login(){  
        
        return view("login");
    }
    public function register(){
        return view("register");
    }
    //data handling + more    
    public function loginPost(Request $request){
        //
    }
    public function registerPost(Request $request){
        //
    }
}
