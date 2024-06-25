<?php

namespace App\Http\Controllers;

use App\Mail\resetPassword;
use App\Models\trainers;
use App\Models\user_assessment;
use App\Models\user_bmi;
use App\Models\user_profile;
use App\Models\user_membership;
use App\Models\user_milestones;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function user_paid($plan,$id){
        if(!Auth::check()){
            abort(404);
        }
        if(Auth::user()->user_type=="admin"){
            User::where("id",$id)->update(["payment_status"=>1]);
            user_membership::where("user_ID",$id)->update([
                "membership_plan" => $plan,
                "start_date" => Carbon::now()->toDateString(),
                "expiry_date" => Carbon::now()->addMonth()->toDateString(),
                "next_payment" => Carbon::now()->addMonth()->toDateString(),
            ]);
            return back();
        }
        abort(404);
    }
    //
    public function register(Request $request)
    {   
        
        $request->validate([
            "username" => "required",
            "email" => "required",
            "password" => "required"
        ]);
        User::create([
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "resetToken" => str::random(128)
        ]);
        $user = User::where("username",$request->username)->get()->first();
        generate_json($user->id, $user->username);
        return back();
    }
    public function milestones(){
        if(!Auth::check()){
            abort(404);
        }
        return response()->json(get_milestones(Auth::user()->username));
    }
    
    public function getUpdatable($id)
    {
        
        $cred = User::where('id', $id)->first();
        $prof = user_profile::where("user_ID", $cred->id)->first();
        $memb = user_membership::where("user_ID", $cred->id)->first();
        $assess = user_assessment::where("profile_ID", $id)->first();
        return response()->json([
            "editFName" => $prof->firstName,
            "editLName" => $prof->lastName,
            "editContactDetails" => $prof->contactDetails,
            "editBirthdate" => $prof->birthdate,
            "editAge" => $prof->age,
            "editStreetNum" => $prof->address_street_num,
            "editBarangay" => $prof->address_barangay,
            "editCity" => $prof->address_city,
            "editRegion" => $prof->address_region,
            "editUsername" => $cred->username,
            "editEmail" => $cred->email,
            "editMembershipType" => $memb->membership_type,
            "editMembershipPlan" => $memb->membership_plan,
            "editMembershipDesc" => $memb->membership_desc,
            "editStartDate" => $memb->start_date,
            "editExpiryDate" => $memb->expiry_date,
            "editNextPayment" => $memb->next_payment,
            "editPaymentStatus" => $memb->payment_status == 1 ? "Yes" : "No",
            "editTrainer" => $memb->Trainer,
            "editHeight" => ($assess == null) ? 0 : $assess->height,
            "editWeight" => ($assess == null) ? 0 : $assess->weight,
            "editBMI" => ($assess == null) ? 0 : $assess->bmi,
            "editBMIType" => ($assess == null) ? null : $assess->bmi_classification,
            "editFit" => ($assess == null) ? "No" : ($assess->physically_fit == 1 ? "Yes" : "No"),
            "editOper" => ($assess == null) ? "No" : ($assess->operation == 1 ? "Yes" : "No"),
            "editHB" => ($assess == null) ? "No" : ($assess->high_blood == 1 ? "Yes" : "No"),
            "editHP" => ($assess == null) ? "No" : ($assess->heart_problem == 1 ? "Yes" : "No"),
            "editEmergName" => ($assess == null) ? "" : $assess->emergency_contact_name,
            "editEmergNum" => ($assess == null) ? "" : $assess->emergency_contact_num,
        ]);
    }
    public function getUser($id)
    {
        
        $cred = User::where('id', $id)->first();
        $prof = user_profile::where("user_ID", $cred->id)->first();
        $memb = user_membership::where("user_ID", $cred->id)->first();
        $assess = user_assessment::where("profile_ID", $id)->first();
        return response()->json([
            "viewDetail" => "Details of " . $prof->firstName . " " . $prof->lastName,
            "viewFName" => $prof->firstName,
            "viewLName" => $prof->lastName,
            "viewContactDetails" => $prof->contactDetails,
            "viewBirthdate" => $prof->birthdate,
            "viewAge" => $prof->age,
            "viewStreetNum" => $prof->address_street_num,
            "viewBarangay" => $prof->address_barangay,
            "viewCity" => $prof->address_city,
            "viewRegion" => $prof->address_region,
            "viewUsername" => $cred->username,
            "viewEmail" => $cred->email,
            "viewMembershipType" => $memb->membership_type,
            "viewMembershipPlan" => $memb->membership_plan,
            "viewMembershipDesc" => $memb->membership_desc,
            "viewStartDate" => $memb->start_date,
            "viewExpiryDate" => $memb->expiry_date,
            "viewNextPayment" => $memb->next_payment,
            "viewPaymentStatus" => $memb->payment_status == 1 ? "Yes" : "No",
            "viewTrainer" => $memb->Trainer,
            "viewHeight" => ($assess == null) ? 0 : $assess->height,
            "viewWeight" => ($assess == null) ? 0 : $assess->weight,
            "viewBMI" => ($assess == null) ? 0 : $assess->bmi,
            "viewBMIType" => ($assess == null) ? null : $assess->bmi_classification,
            "viewFit" => ($assess == null) ? "No" : ($assess->physically_fit == 1 ? "Yes" : "No"),
            "viewOper" => ($assess == null) ? "No" : ($assess->operation == 1 ? "Yes" : "No"),
            "viewHB" => ($assess == null) ? "No" : ($assess->high_blood == 1 ? "Yes" : "No"),
            "viewHP" => ($assess == null) ? "No" : ($assess->heart_problem == 1 ? "Yes" : "No"),
            "viewEmergName" => ($assess == null) ? "" : $assess->emergency_contact_name,
            "viewEmergNum" => ($assess == null) ? "" : $assess->emergency_contact_num,
        ]);
    }
    public function update(Request $request, $what)
    {
        if ($what == "credentials") {
            $request->validate([
                "editCredID" => "required",
                "editUsername" => "required",
                "editEmail" => "required"
            ]);
            User::where('id', $request->editCredID)->update([
                "username" => $request->editUsername,
                "email" => $request->editEmail
            ]);
        }
        if ($what == "profile") {
            $request->validate([
                "editFName" => "required",
                "editLName" => "required",
                "editContactDetails" => "required",
                "editBirthdate" => "required",
                "editAge" => "required",
                "editStreetNum" => "required",
                "editBarangay" => "required",
                "editCity" => "required",
                "editRegion" => "required",
            ]);
            user_profile::where('profile_ID', $request->editProfID)->update(
                [
                    'firstName' => $request->editFName,
                    'lastName' => $request->editLName,
                    'contactDetails' => $request->editContactDetails,
                    'birthdate' => $request->editBirthdate,
                    'age' => $request->editAge,
                    'address_street_num' => $request->editStreetNum,
                    'address_barangay' => $request->editBarangay,
                    'address_city' => $request->editCity,
                    'address_region' => $request->editRegion,
                ]
            );
        }
        if ($what == "membership") {
            $request->validate([
                "editMembershipType" => "required",
                "editMembershipPlan" => "required",
                "editMembershipDesc" => "required",
                "editStartDate" => "required",
                "editExpiryDate" => "required",
                "editNextPayment" => "required",
                "editPaymentStatus" => "required",
            ]);
            user_membership::where("userMem_ID", $request->editMembID)->update([
                'membership_type' => $request->editMembershipType,
                'membership_plan' => $request->editMembershipPlan,
                'membership_desc' => $request->editMembershipDesc,
                'start_date' => $request->editStartDate,
                'expiry_date' => $request->editExpiryDate,
                'next_payment' => $request->editNextPayment,
                'payment_status' => $request->editPaymentStatus
            ]);
        }
        if ($what == "assessment") {
            $request->validate([
                "editHeight" => "required",
                "editWeight" => "required",
                "editBMI" => "required",
                "editBMIType" => "required",
                "editFit" => "required",
                "editOper" => "required",
                "editHB" => "required",
                "editHP" => "required",
                "editEmergName" => "required",
                "editEmergNum" => "required"
            ]);
            user_assessment::where("userAsses_ID", $request->editAsseID)->update([
                'height' => $request->editHeight,
                'weight' => $request->editWeight,
                'bmi' => $request->editBMI,
                'bmi_classification' => $request->editBMIType,
                'physically_fit' => $request->editFit,
                'operation' => $request->editOper,
                'high_blood' => $request->editHB,
                'heart_problem' => $request->editHP,
                'emergency_contact_name' => $request->editEmergName,
                'emergency_contact_num' => $request->editEmergNum,
            ]);
        }

        return back();

    }
    public function register_admin($id){
        if(!Auth::check()){
            abort(404);
        }
        if(Auth::user()->user_type=="admin"){
            User::where("id",$id)->update(["user_type"=>"admin"]);
            return back();
        }
        abort(404);
        
    }
    public function register_coach($id){
        if(!Auth::check()){
            abort(404);
        }
        if(Auth::user()->user_type=="admin"){
            User::where("id",$id)->update(["user_type"=>"coach"]);
            return back();
        }
        abort(404);
        
    }
    public function fill_details(Request $request){
        $request->validate([
            "data_privacy_accepted" => "required",
            "regID" =>          "required",
            "regFname" =>       "required",
            "regLname" =>       "required",
            "regBirthdate" =>   "required",
            "regContactNum" =>  "required",
            "regRegion" =>      "required",
            "regCity" =>        "required",
            "regBarangay" =>    "required",
            "regStreetNum" =>   "required",
            "regPhysFit" =>     "required",
            "regOperation" =>   "required",
            "regBP" =>          "required",
            "regHP" =>          "required",
            "regEmergName" =>   "required",
            "regEmergNum" =>    "required",
            "regTrainer" =>     "required",
            "regHeight" => "required",
            "regWeight" => "required",
            "regBMI"    => "required",
            "regBMIType"=> "required",
        ]);
        User::where("id",$request->input("regID"))->update(["data_filled"=>true]);
        foreach(File::json(Storage::disk('jsons')->path('lifts_data.json')) as $v){
            user_milestones::create([
                "username" => Auth::user()->username,
                "lift" => $v['lift'],
                "reps" => $v['reps'],
                "weight" => 0,
                "date" => Carbon::now()->toDateString()
            ]);
        }
        user_membership::create([
            'user_ID'=>$request->regID,
            'membership_plan'=>null,
            'start_date'=>null,
            'expiry_date'=>null,
            'next_payment'=>null,
            'Trainer'=>$request->regTrainer
        ]);
        user_profile::create([
            'firstName'       =>  $request->regFname,
            'lastName'        =>  $request->regLname,
            'contactDetails'  =>  $request->regContactNum,
            'birthdate'       =>  $request->regBirthdate,
            'age' => (int) Carbon::now()->diffInYears(Carbon::parse($request->regBirthdate)),
            'address_street_num'  =>  $request->regStreetNum,
            'address_barangay'    =>  $request->regBarangay,
            'address_city'        =>  $request->regCity,
            'address_region'      =>  $request->regRegion,
            'user_ID'             =>  $request->regID,
            'userMem_ID'          =>  $request->regID,
        ]);
        user_assessment::create([
            'physically_fit'=>$request->regPhysFit,
            'operation'=>$request->regOperation,
            'high_blood'=>$request->regBP,
            'heart_problem'=>$request->regHP,
            'emergency_contact_name'=>$request->regContactNum,
            'emergency_contact_num'=>$request->regContactNum,
            'profile_ID'=>user_profile::where("user_ID",$request->regID)->get()->first()->profile_ID
        ]);
        $user = User::where("id",$request->regID)->get()->first();
        user_bmi::create([
            'username'=>$user->username,
            'height'=>$request->regHeight,
            'weight'=>$request->regWeight,
            'bmi'=>$request->regBMI,
            'bmi_classification'=>$request->regBMIType,
            'date'=>Carbon::now()->toDateString()
        ]);
        trainers::where("name",$request->regTrainer)->increment("trainee_count");
        return back();
    }
    



    public function delete($id)
    {
        if (File::exists(public_path('qrcodes') . "\\$id.png")) {
            File::delete(public_path('qrcodes') . "\\$id.png");
            User::find($id)->delete();
            user_membership::where('userMem_ID', $id)->delete();
        }

        return back();
    }
    public function get_region()
    {
        if (!Auth::check() ) {
            abort(404);
        }
        return response()->json(\JSON_DATA::get_regions());
    }
    public function get_cities($region_code)
    {
        if (!Auth::check() ) {
            abort(404);
        }
        return response()->json(\JSON_DATA::get_cities($region_code));
    }
    public function get_barangays($region_code, $city_code)
    {
        if (!Auth::check() ) {
            abort(404);
        }
        return response()->json(\JSON_DATA::get_barangays($region_code, $city_code));
    }
    public function phonenums()
    {
        if (!Auth::check() || Auth::user()->user_type == "user") {
            abort(404);
        }
        return response()->json(File::json(public_path() . "\\json\\phonenums.json"));
    }
    public function flag($code)
    {
        $filename = $code.".png";
        return response()->file(public_path("flags\\$filename"));
    }
}