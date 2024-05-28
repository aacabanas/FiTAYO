<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\user_assessment;
use App\Models\user_profile;
use App\Models\user_membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Brick\PhoneNumber\PhoneNumber;

class AuthController extends Controller
{
    private function convert_contact($contact): string
    {
        $contact_split = str_split($contact);
        $contact_split[0] = "+63";
        return join($contact_split);
    }

    public function push()
    {
        User::create([
            "username" => "fitayo",
            "email" => "mail@mail.com",
            "password" => Hash::make("passw"),
        ]);

        user_membership::create([
            'membership_type' => "Member",
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
            'user_ID' => latest_mem(),
            'userMem_ID' => latest_mem()
        ]);

    }

    private function getPlan(int $plan): string
    {
        return ["Basic", "Standard", "Premium"][$plan - 1];
    }

    private function getMembershipType(int $type)
    {
        return ["Member", "Non-Member"][$type - 1];
    }

    private function getBMI($weight, $height)
    {
        return round(($weight / (($height * 12) * ($height * 12)) * 703), 2);
    }

    private function getBMIType($bmi): string
    {
        $bmitypee = "";
        $category = ["Underweight", "Normal weight", "Overweight", "Obesity"];
        if ($bmi < 18.5) {
            $bmitypee = $category[0];
        } else if ($bmi <= 24.9) {
            $bmitypee = $category[1];
        } else if ($bmi <= 29.9) {
            $bmitypee = $category[2];
        } else {
            $bmitypee = $category[3];
        }
        return $bmitypee;
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
                return view('dashboard.user', ["withAssessment" => user_assessment::where('userAsses_ID', Auth::id())->first() == null]);
            }
            return view('dashboard.index', [
                "members" => members(),
                "member_count" => user_membership::where("membership_type", "Member")->count(),
                "monthly" => user_membership::whereMonth('created_at', "=", date('m'))->where("membership_type", "Member")->count()
            ]);
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->intended();
    }
}
