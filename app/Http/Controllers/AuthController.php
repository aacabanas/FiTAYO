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
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Brick\PhoneNumber\PhoneNumber;

class AuthController extends Controller
{
    private function convert_contact($contact):string {
        $contact_split = str_split($contact);
        $contact_split[0] = "+63";
        return join($contact_split);
    }

    public function push() {
        User::create([
            "username" => 'fitayo',
            "password" => Hash::make('123abc'),
            "email" => "test12345@mail.com",
            "user_type" => "user",
            "created_at" => Carbon::now()
        ]);
        user_membership::create([
            "membership_type" => $this->getMembershipType(1),
            "membership_plan" => $this->getPlan(3),
            "membership_desc" => "desc goes here",
            "start_date" => date("Y-m-d"),
            "expiry_date" => date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d")))),
            "next_payment" => date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d")))),
            "payment_status" => true,
            "Trainer" => null,
            "created_at" => Carbon::now()
        ]);

        user_profile::create([
            "firstName" => "fname",
            "lastName" => "lname",
            "profileBio" => "insert bio",
            "contactDetails" => "09123456789",
            "birthdate" => "2000-11-30",
            "address_num" => "321",
            "address_street" => "X",
            "address_city" => "Y",
            "address_region" => "Z",
            "user_ID" => 1,
            "userMem_ID" => 1,
            "created_at" => Carbon::now()
        ]);
    }

    private function getPlan(int $plan): string {
        return ["Basic", "Standard", "Premium"][$plan - 1];
    }

    private function getMembershipType(int $type) {
        return ["Member", "Non-Member"][$type - 1];
    }

    private function getBMI($weight, $height) {
        return round(($weight / (($height * 12) * ($height * 12)) * 703), 2);
    }

    private function getBMIType($bmi): string {
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

    public function index() {
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('index', ["count" => User::count()]);
    }

    public function login() {
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('auth.login');
    }

    public function registration() {
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('auth.register', ['count' => User::count()]);
    }

    public function loginPost(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard')
                ->withSuccess('You have Successfully logged in');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function dashboard() {
        if (Auth::check()) {
            if (User::where('id', Auth::id())->first()->user_type == "user") {
                return view('dashboard.user');
            }

            return view('dashboard.index', [
                "members" => $this->members(), // Call the function defined in this class
                "member_count" => user_membership::where("membership_type", "Member")->count(),
                "monthly" => user_membership::whereMonth('created_at', "=", date('m'))->where("membership_type", "Member")->count()
            ]);
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    // Add the members() function definition here
    public function members() {
        // Implement your logic here
        return User::all(); // Example: returning all users
    }

    public function create_assessment(Request $request) {
        $request->validate([
            "userID" => "required",
            "userWeight" => "required",
            "userHeight" => "required",
            "userMedHist" => "required",
            "userHasIllness" => "required",
            "userHasInjuries" => "required",
        ]);
        user_assessment::create([
            "profile_ID" => $request->userID,
            "height" => $request->userHeight,
            "weight" => $request->userWeight,
            "bmi" => $this->getBMI($request->userWeight, $request->userHeight),
            "bmi_classification" => $this->getBMIType($this->getBMI($request->userWeight, $request->userHeight)),
            "medical_history" => $request->userMedHist,
            "hasIllness" => $request->userHasIllness,
            "hasInjuries" => $request->userHasInjuries,
            "created_at" => Carbon::now()
        ]);
        return back();
    }

    public function update_assessent(Request $request) {
        $request->validate([
            "userID" => "required",
            "userWeight" => "required",
            "userHeight" => "required",
            "userMedHist" => "required",
            "userHasIllness" => "required",
            "userHasInjuries" => "required",
        ]);
        user_assessment::where("userAssess_ID", "=", $request->userID)->update([
            "height" => $request->userHeight,
            "weight" => $request->userWeight,
            "bmi" => $this->getBMI($request->userWeight, $request->userHeight),
            "bmi_classification" => $this->getBMIType($this->getBMI($request->userWeight, $request->userHeight)),
            "medical_history" => $request->userMedHist,
            "hasIllness" => $request->userHasIllness,
            "hasInjuries" => $request->userHasInjuries,
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->intended();
    }
}
