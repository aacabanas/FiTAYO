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
    public function updateUser(Request $request){
        $request->validate([
            "userID"                => "required",
            "editUsername"          => "required",
            "editUserType"          => "required",
            "editFname"             => "required",
            "editLname"             => "required",
            "editProfileBio"        => "required",
            "editContactNum"        => "required",
            "editBirthdate"         => "required",
            "editMembershipType"    => "required",
            "editMembershipPlan"    => "required",
            "editMembershipDesc"    => "required",
            "editWeight"            => "required",
            "editHeight"            => "required",
            "editAddressNum"        => "required",
            "editAddressStreet"     => "required",
            "editAddressCity"       => "required",
            "editAddressRegion"     => "required",
            "editEmail"             => "required",
            "editTrainer"           => "required",
            "editStartDate"         => "required",
            "editExpiryDate"        => "required",
            "editNextPayment"       => "required",
            "editPaymentStatus"     => "required",
            "editHasIllness"        => "required",
            "editHasInjuries"       => "required",
            "editMedicalHistory"    => "required"
        ]);

        $credentials = [
            "username" => $request->get("editUsername"),
            "user_email"=> $request->get("editEmail"),
            "user_type" => $request->get("editUserType"),
        ];
        $membership = [
            "membership_type"   => getMembershipType($request->get("editMembershipType")),
            "membership_plan"   => getPlan($request->input("editMembershipPlan")),
            "membership_desc"   => $request->get("editMembershipDesc"),
            "start_date"        => $request->get("editStartDate"),
            "expiry_date"       => $request->get("editExpiryDate"),
            "next_payment"      => $request->get("editNextPayment"),
            "payment_status"    => $request->get("editPaymentStatus"),
            "Trainer"           => $request->get("editTrainer")
        ];
        $profile = [
            "firstName"         => $request->get("editFname"),
            "lastName"          => $request->get("editLname"),
            "profileBio"        => $request->get("editProfileBio"),
            "contactDetails"    => $request->get("editContactNum"),
            "birthdate"         => $request->get("editBirthdate"),
            "address_num"       => $request->get("editAddressNum"),
            "address_street"    => $request->get("editAddressStreet"),
            "address_city"      => $request->get("editAddressCity"),
            "address_region"    => $request->get("editAddressRegion"),
        ];
        $assessment = [
            "height"                => $request->get("editHeight"),
            "weight"                => $request->get("editWeight"),
            "bmi"                   => getBMI($request->get("editWeight"),$request->get("editHeight")),
            "bmi_classification"    => getBMIType(getBMI($request->get("editWeight"),$request->get("editHeight"))),
            "medical_history"       => $request->get("editMedicalHistory"),
            "hasIllness"            => $request->get("editHasIllness"),
            "hasInjuries"           => $request->get("editHasInjuries")
        ];
        
        user_credentials::where("user_ID","=",$request->userID)->update($credentials);
        user_membership::where("userMem_ID","=",$request->userID)->update($membership);
        user_profile::where("profile_ID","=",$request->userID)->update($profile);
        user_assessment::where("userAsses_ID","=",$request->userID)->update($assessment);

        /* $cred = new user_credentials;
        
        $memb = new user_membership;

        $prof = new user_profile;

        $assess = new user_assessment;
        
        $cred->editUser($credentials,$id);
        $memb->editUser($membership,$id);
        $prof->editUser($profile,$id);
        $assess->editUser($assessment,$id); */
        //user_credentials::find($id)->update($credentials);
        //user_membership::find($id)->update($membership);
        //user_profile::find($id)->update($profile);
        //user_assessment::find($id)->update($assessment);
        return redirect()->intended()->with(["success"=>"User successfully updated"]);
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
            "username"      => $request->input("username"),
            "password"      => Hash::make($request->input("password")),
            "user_email"    => $request->input("email"),
            "user_type"     => $request->input("user_type"),
            "created_at"    => Carbon::now()
        ];
        
        //membership
        $membership = [
            "membership_type"   => getMembershipType($request->input("membership_type")),
            "membership_plan"   => getPlan($request->input("membership_plan")),
            "membership_desc"   => $request->membership_desc,
            "start_date"        => date("Y-m-d"),
            "expiry_date"       => date("Y-m-d",strtotime("+1 month",strtotime(date("Y-m-d")))),
            "next_payment"      => date("Y-m-d",strtotime("+1 month",strtotime(date("Y-m-d")))),
            "payment_status"    => $request->input("payment_status"),
            "Trainer"           => $request->input("trainer"),
            "created_at"        => Carbon::now()
        ];
        //create data dictionary for the user_profile table
        $profile = [
            "firstName"         => $request->input("first_name"),
            "lastName"          => $request->input("last_name"),
            "profileBio"        => $request->input("profile_bio"),
            "contactDetails"    => $request->input("contact_number"),
            "birthdate"         => $request->input("birthdate"),
            "address_num"       => $request->input("address_num"),
            "address_street"    => $request->input("address_street"),
            "address_city"      => $request->input("address_city"),
            "address_region"    => $request->input("address_region"),
            "user_ID"           => (DB::table("user_credentials")->count("user_ID")==0)? 1:DB::table("user_credentials")->get("user_ID")->last()->user_ID,
            "userMem_ID"        => (DB::table("user_membership")->count()==0)?1:DB::table("user_membership")->get("userMem_ID")->last()->userMem_ID,
            "created_at"        => Carbon::now()
        ];
        //create data dictionary for the user_assessment table
        $assessment = [
            "height"                => $request->input("height"),
            "weight"                => $request->input("weight"),
            "bmi"                   => getBMI($request->input("weight"),$request->input("height")),
            "bmi_classification"    => getBMIType(getBMI($request->input("weight"),$request->input("height"))),
            "medical_history"       => $request->input("medical_history"),
            "hasIllness"            => $request->input("hasIllness"),
            "hasInjuries"           => $request->input("hasInjuries"),
            "created_at"            => Carbon::now(),
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

