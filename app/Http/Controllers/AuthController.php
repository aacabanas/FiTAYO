<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\NonMemberModel;
use App\Models\user_assessment;
use App\Models\checkins;
use App\Models\user_profile;
use App\Models\user_membership;
use App\Models\MilestoneProgress;
use App\Models\trainers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Session;
use Carbon\Carbon;
use Brick\PhoneNumber\PhoneNumber;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class AuthController extends Controller
{
    public function push()
    {   
        User::create([
            "username" => "fitayo1",
            "email" => "mail@mail.com",
            "password" => Hash::make("passw"),
            "resetToken" => str::random(128)
        ]);

        user_membership::create([
            "membership_plan" => "Standard",
            "start_date" => Carbon::now(),
            "expiry_date" => Carbon::now()->addMonth(),
            "next_payment" => Carbon::now()->addMonth(),
            "payment_status" => "Yes" == "Yes"
        ]);
        user_profile::create([
            'firstName' => "abc",
            'lastName' => "def",
            'contact_prefix' => "63",
            'contactDetails' => "09123456790",
            'birthdate' => "2000-11-30",
            'age' => 22,
            'address_street_num' => "123 dsf",
            'address_barangay' => "sda",
            'address_city' => "dsd",
            'address_region' => "asd",
            'user_ID' => 2,
            'userMem_ID' => 2
        ]);
        User::where('id',2)->update(["user_type"=>"coach"]);
        /* $trainers = [['name'=>"John Doe",'email'=>'jdoe@mail.com','phone'=>'09123456781','specialty'=>'abs'],['name' => "Alice Smith",'email'=>"alice@mail.com",'phone'=>'09123456782','specialty'=>'legs'],['name' => "Bob-d Builder",'email'=>"bob@mail.com",'phone'=>"09123456783",'specialty'=>"cardio"]];
        foreach($trainers as $t){
            trainers::create($t);
        } */
    }

    public function index()
    {   
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('index', ["count" => User::count()]);
    }

    public function login()
    {   
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('auth.login');
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('auth.register', ['count' => User::count()]);
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

    public function dashboard()
    {   
        if (Auth::check()) {
            if (Auth::user()->user_type == "user") {
                return view('dashboard.user', [
                "withAssessment" => user_assessment::where('userAsses_ID', Auth::id())->first() == null,
                "profile" => user_profile::where('profile_ID',Auth::id())->first(),
                "assessment"=>user_assessment::where("userAsses_ID",Auth::id())->first(),
                "userProfile" => user_membership::where("userMem_ID",Auth::id())->first()
            ]);
            }

            if (Auth::user()->user_type == "coach") {
                return view('dashboard.coach',[
                    "pendings" => MilestoneProgress::whereDate("date",Carbon::now()->toDateString())->where('status','pending')->get()
                ]);
            }

            return view('dashboard.index', [
                "members" => members(),
                "member_count" => user_membership::count(),
                "monthly" => user_membership::whereMonth('created_at', "=", date('m'))->count(),
                "guests" => NonMemberModel::whereDate("date",Carbon::now()->format("Y-m-d"))->count()              
                ,"id" => User::count()+1,
                "checkincount" => checkins::where("date",Carbon::now()->format("Y-m-d"))->count(),
                "trainers" => trainers::all(),
                "non_members" => non_members(),
                "deadlines" => deadlines()
            ]);
            
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function logout()
    {
        if(Auth::check()){
            Session::flush();
            Auth::logout();
            
            return redirect()->intended();
        }
        abort(404);
        

    }
}