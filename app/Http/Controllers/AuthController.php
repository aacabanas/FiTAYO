<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NonMemberModel;
use App\Models\user_assessment;
use App\Models\checkins;
use App\Models\user_bmi;
use App\Models\user_profile;
use App\Models\user_membership;
use App\Models\MilestoneProgress;
use App\Models\trainers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function push()
    {
        User::create([
            "username" => "fitayo",
            "email" => "mail123@mail.com",
            "password" => Hash::make("passw"),
            "resetToken" => str::random(128)
        ]);
        $user = User::where("username","fitayo")->get()->first();
       
        $trainers = [['name' => "John Doe", 'email' => 'jdoe@mail.com', 'phone' => '09123456781', 'specialty' => 'abs',"time_in" => "00:00:00","time_out"=>"23:59:00"], ['name' => "Alice Smith", 'email' => "alice@mail.com", 'phone' => '09123456782', 'specialty' => 'legs',"time_in" => "10:00:00","time_out"=>"18:00:00"], ['name' => "Bob-d Builder", 'email' => "bob@mail.com", 'phone' => "09123456783", 'specialty' => "cardio","time_in" => "10:00:00","time_out"=>"17:00:00"]];
        foreach ($trainers as $t) {
            trainers::create($t);
        }
        generate_json($user->id, $user->username);
    }

    public function index(Request $request)
    {

        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('index', ["count" => User::count()]);
    }
    public function register(){
        if(Auth::check()){
            return redirect()->intended('/dashboard');
        }
        return view('auth.register');
    }
    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('auth.login');
    }

    

    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            Auth::login(Auth::user());
            return redirect()->intended('/dashboard')
                ->withSuccess('You have Successfully logged in');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function dashboard(Request $request)
    {
        if (Auth::check()) {
            $time = Carbon::now()->toTimeString();
            if (Auth::user()->user_type == "user") {
                    return view('dashboard.user', [
                        "withAssessment" => user_assessment::where('userAsses_ID', Auth::id())->first() == null,
                        "profile" => user_profile::where('profile_ID', Auth::id())->first(),
                        "assessment" => user_assessment::where("userAsses_ID", Auth::id())->first(),
                        "membership" => user_membership::where("userMem_ID", Auth::id())->first(),
                        "visits"  => checkins::where("username",Auth::user()->username)->get(),
                        "trainers" => trainers::where("trainee_count","<",10)->whereTime("time_in","<=",$time)->whereTime("time_out",">=",$time)->get(),
                        "bmis" => user_bmi::where("username",Auth::user()->username)->get()
                        #"milestones" => get_milestones(Auth::user()->username)
                    ]);
                
                
            }

            if (Auth::user()->user_type == "coach") {
                return view('dashboard.coach', [
                    "pendings" => MilestoneProgress::where('status', 'pending')->get(),
                    "trainers" => trainers::get()
                ]);
            }

            return view('dashboard.index', [
                "members" => members(),
                "member_count" => user_membership::count(),
                "monthly" => user_membership::whereMonth('created_at', "=", date('m'))->count(),
                "guests" => NonMemberModel::whereDate("date", Carbon::now()->format("Y-m-d"))->count()
                ,
                "id" => User::count() + 1,
                "checkincount" => checkins::where("date", Carbon::now()->format("Y-m-d"))->count(),
                "trainers" => trainers::all(),
                "non_members" => non_members(),
            ]);

        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function logout()
    {
        if (Auth::check()) {
            Session::flush();
            Auth::logout();

            return redirect()->intended();
        }
        abort(404);


    }
}