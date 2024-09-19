<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
use App\Models\User;
use App\Models\trainers;
use App\Models\user_milestones;

class View extends Controller
{
    //
    public function push(){
        /* User::create([
            "username" => "fitayo1",
            "email" => "mail1234@mail.com",
            "password" => Hash::make("passw"),
            "resetToken" => str::random(128)
        ]);
        $user = User::where("username","fitayo")->get()->first();
        */
        $trainers = [['name' => "John Doe", 'email' => 'jdoe@mail.com', 'phone' => '09123456781', 'specialty' => 'abs',"time_in" => "00:00:00","time_out"=>"23:59:00"], ['name' => "Alice Smith", 'email' => "alice@mail.com", 'phone' => '09123456782', 'specialty' => 'legs',"time_in" => "10:00:00","time_out"=>"18:00:00"], ['name' => "Bob-d Builder", 'email' => "bob@mail.com", 'phone' => "09123456783", 'specialty' => "cardio","time_in" => "10:00:00","time_out"=>"17:00:00"]];
        foreach ($trainers as $t) {
            trainers::create($t);
        }
    }
    public function index(Request $request){
        return Auth::check() ? redirect()->intended("/dashboard") : view('index');
    }
    public function dashboard(Request $request){
        #dd(user_milestones::where("reps","=",1)->where("lift","=","Bench Press")->where("username","=",Auth::user()->username));
        return Auth::check() ? (
            Auth::user()->user_type == "user" ? view("dashboard.user") : 
            (Auth::user()->user_type == "coach" ? view('dashboard.coach') : 
                                                    view('dashboard.admin'))) : 
                                                        redirect("login");
    }
    public function login(){
        return Auth::check() ? redirect()->intended("/dashboard") : view("auth.login");
    }

    public function register(){
        return Auth::check() ? abort(404) : view("register");
    }
    public function logout(){
        if (Auth::check()) {
            Session::flush();
            Auth::logout();

            return redirect()->intended();
        }
        abort(404);
    }
    
}
