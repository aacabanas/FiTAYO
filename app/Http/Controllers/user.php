<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\user_credentials;
use App\Models\user_membership;
use App\Models\user_profile;
use App\Models\user_assessment;

class user extends Controller
{
    //
    public function loginPost(Request $request)
    {
        //validate form data
        $request->validate([
            "username" => "required",
            "password" => "required",
        ]);
        $credentials = $request->only("username", "password");
        if (Auth::attempt($credentials)) {
            Session::put("user", userAuth());
            Session::put("logged", true);
            Session::keep(["user", "logged"]);
            return redirect()->intended(route("index"));
        }
        return redirect()->intended()->with(["error" => "The user \"$request->username\" is not found in our system"]);
    }
    public function registerPost(Request $request)
    {
        /*
        user_credentials - 1
        user_membership  - 2
        user_profile     - 3   
        user_assessment  - 4
        */
        $request->validate([
            "username"          => "required",
            "password"          => "required",
            "email"             => "required",
            "user_type"         => "required",
            "membership_desc"   => "required",
            "membership_plan"   => "required",
            "membership_type"   => "required",
            "payment_status"    => "required",
            "trainer"           => "required",
            "address_city"      => "required",
            "address_num"       => "required",
            "address_street"    => "required",
            "address_region"    => "required",
            "birthdate"         => "required",
            "contact_number"    => "required",
            "first_name"        => "required",
            "last_name"         => "required",
            "profile_bio"       => "required",
            "medical_history"   => "required",
            "hasIllness"        => "required",
            "hasInjuries"       => "required",
            "height"            => "required",
            "weight"            => "required"
        ]);
        //credential
        $credentials = [
            "username"      => $request->get("username"),
            "password"      => Hash::make($request->get("password")),
            "user_email"    => $request->get("email"),
            "user_type"     => getUserType($request->get("user_type")),
        ];
        
        //membership
        $membership = [
            "membership_type"   => getMembershipType($request->get("membership_type")),
            "membership_plan"   => getPlan($request->get("membership_plan")),
            "membership_desc"   => $request->membership_desc,
            "start_date"        => date("Y-m-d"),
            "expiry_date"       => date("Y-m-d",strtotime("+1 month",strtotime(date("Y-m-d")))),
            "next_payment"      => date("Y-m-d",strtotime("+1 month",strtotime(date("Y-m-d")))),
            "payment_status"    => $request->get("payment_status"),
            "Trainer"           => $request->get("trainer")
        ];
        //create data dictionary for the user_profile table
        $profile = [
            "firstName"         => $request->get("first_name"),
            "lastName"          => $request->get("last_name"),
            "profileBio"        => $request->get("profile_bio"),
            "contactDetails"    => $request->get("contact_number"),
            "birthdate"         => $request->get("birthdate"),
            "address_num"       => $request->get("address_num"),
            "address_street"    => $request->get("address_street"),
            "address_city"      => $request->get("address_city"),
            "address_region"    => $request->get("address_region"),
            "user_ID"           => (DB::table("user_credentials")->count("user_ID")==0)? 1:DB::table("user_credentials")->get("user_ID")->last()->user_ID,
            "userMem_ID"        => (DB::table("user_membership")->count()==0)?1:DB::table("user_membership")->get("userMem_ID")->last()->userMem_ID
        ];
        //create data dictionary for the user_assessment table
        $assessment = [
            "height"                => $request->get("height"),
            "weight"                => $request->get("weight"),
            "bmi"                   => getBMI($request->get("weight"),$request->get("height")),
            "bmi_classification"    => getBMIType(getBMI($request->get("weight"),$request->get("height"))),
            "medical_history"       => $request->get("medical_history"),
            "hasIllness"            => $request->get("hasIllness"),
            "hasInjuries"           => $request->get("hasInjuries"),
            "profile_ID"            => (DB::table("user_profile")->count()==0)?1:DB::table("user_profile")->get("profile_ID")->last()->profile_ID,
        ];
        //save records to db
        user_credentials::insert($credentials);
        user_membership::insert($membership);
        user_profile::insert($profile);
        user_assessment::insert($assessment);

        return redirect()->intended()->with(["success","User successfully created"]);
    }
}

