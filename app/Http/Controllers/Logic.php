<?php

namespace App\Http\Controllers;

use App\Models\MilestoneProgress;
use App\Models\NonMemberModel;
use App\Models\trainers;
use App\Models\user_assessment;
use App\Models\user_bmi;
use App\Models\user_profile;
use App\Models\user_membership;
use App\Models\user_milestones;
use App\Models\checkins;
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

class Logic extends Controller
{
    //STATIC FILE PATHS HERE
    private function lifts_data()
    {
        return [
            "1bp" => [
                "lift" => "Bench Press",
                "reps" => 1
            ],
            "6bp" => [
                "lift" => "Bench Press",
                "reps" => 6
            ],
            "12bp" => [
                "lift" => "Bench Press",
                "reps" => 12
            ],
            "1dl" => [
                "lift" => "Deadlift",
                "reps" => 1
            ],
            "6dl" => [
                "lift" => "Deadlift",
                "reps" => 6
            ],
            "12dl" => [
                "lift" => "Deadlift",
                "reps" => 12
            ],
            "1bs" => [
                "lift" => "Barbell Squats",
                "reps" => 1
            ],
            "6bs" => [
                "lift" => "Barbell Squats",
                "reps" => 6
            ],
            "12bs" => [
                "lift" => "Barbell Squats",
                "reps" => 12
            ]
        ];
    }
    private function regions_json()
    {
        return public_path("json\\regions\\regions.json");
    }
    //HELPER FUNCTIONS HERE

    //REGISTER FUNCTIONS HERE
    public function register(Request $request)
    {

        $request->validate([
            "data_privacy_accepted" => "required",
            "regID" => "required",
            "email" => "required ",
            "username" => "required",
            "password" => "required",
            "firstname" => "required",
            "lastname" => "required",
            "birthdate" => "required",
            "contactnum" => "required",
            "region" => "required",
            "city" => "required",
            "barangay" => "required",
            "streetnum" => "required",
            "height" => "required",
            "weight" => "required",
            "bmi" => "required",
            "bmitype" => "required",
            "physfit" => "required",
            "operation" => "required",
            "bp" => "required",
            "hp" => "required",
            "emergencyname" => "required",
            "emergencycontact" => "required",
            "trainer" => "required",
        ]);
        User::create([
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "resetToken" => str::random(128)
        ]);
        foreach (self::lifts_data() as $v) {
            user_milestones::create([
                "username" => $request->username,
                "lift" => $v["lift"],
                "reps" => $v["reps"],
                "weight" => 0,
                "date" => Carbon::now()->toDateString()
            ]);
        }
        user_membership::create([
            "user_ID" => $request->regID,
            "Trainer" => $request->trainer
        ]);
        user_profile::create([
            'firstName' => $request->firstname,
            'lastName' => $request->lastname,
            'contactDetails' => $request->contactnum,
            'birthdate' => $request->birthdate,
            'age' => (int) Carbon::now()->diffInYears(Carbon::parse($request->birthdate),true),
            'address_street_num' => $request->streetnum,
            'address_barangay' => $request->barangay,
            'address_city' => $request->city,
            'address_region' => $request->region,
            'user_ID' => $request->regID,
            'userMem_ID' => $request->regID,
        ]);
        user_assessment::create([
            'physically_fit' => $request->physfit,
            'operation' => $request->operation,
            'high_blood' => $request->bp,
            'heart_problem' => $request->hp,
            'emergency_contact_name' => $request->emergencyname,
            'emergency_contact_num' => $request->emergencycontact,
            'profile_ID' => $request->regID
        ]);
        $user = User::where("id", $request->regID)->get()->first();
        user_bmi::create([
            'username' => $user->username,
            'height' => $request->height,
            'weight' => $request->weight,
            'bmi' => $request->bmi,
            'bmi_classification' => $request->bmitype,
            'date' => Carbon::now()->toDateString()
        ]);
        trainers::where("name", $request->regTrainer)->increment("trainee_count");
        return redirect()->route('login_get');
    }
    public function register_non_member(Request $request){
        $request->validate([
            "firstname" => "required",
            "lastname" => "required"
        ]);
        $time = Carbon::now()->toTimeString();
        $date = Carbon::now()->toDateString();
        NonMemberModel::create([
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "date" => $date,
            "time_in" => $time
        ]);
        return back();
    }
    //LOGIN FUNCTIONS HERE
    public function login(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" =>"required"
        ]);
        
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            Auth::login(Auth::user());
            return redirect()->intended('/dashboard')
                ->withSuccess('You have Successfully logged in');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    //API-like FUNCTIONS HERE
    public function check_in(Request $request){
        $id = $request->get("id");
        $username = $request->get("username");
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toTimeString();
        if(checkins::where("date",$date)->where("user_id",$id)->first()!=null){
            return response()->json(["check_in" => "$username has already checked-in"]);
        }
        checkins::create([
            "user_id" => $id,
            "username" => $username,
            "date" => $date,
            "time_in" => $time,
            "time_out" => null
        ]);
        return response()->json(["check_in" => "The user with the ID $id and username $username has checked-in"]);
    }
    public function check_out(Request $request){
        $id = $request->get("id");
        $username = $request->get("username");
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toTimeString();
        if(isset(checkins::where("date",$date)->where("user_id",$id)->first()->time_out)){
            return response()->json(["check_out"=>"The user $username has already checked out"]);
        }
        checkins::where("date",$date)->where("user_id",$id)->update(["time_out"=>$time]);
        return response()->json(["check_out" => "The user with the ID $id and username $username has checked out"]);
    }
    public function get_user(Request $request){
        $id = $request->get("id");  
        $user = User::where("id",$id)->get()->first();
        $membership = $user->user_membership->get()->first();
        $profile = $user->user_profile->get()->first();
        $assessment = user_assessment::where("profile_ID",$profile->profile_ID)->get()->first();
        $bmis = user_bmi::where("username",$user->username)->get();
        return response()->json(["user" => $user,"membership"=>$membership,"profile"=>$profile,"assessment"=>$assessment,"bmis"=>$bmis]);
    }       
    public function request_milestone_progress(Request $request){
        if(!Auth::check()){
            return abort(404);
        }
        $lift = $request->get("lift");
        $reps = $request->get("reps");
        $mode = $request->get("mode") == "work"? "+20" : ($request->get("mode") == "lazy" ? "-20":null);
        
        MilestoneProgress::create([
            "lift" => $lift,
            "reps" => $reps,
            "username" => Auth::user()->username,
            "action" => $mode,
            "date" => Carbon::now()->toDateString(),
            "request_time" => Carbon::now()->toTimeString()
        ]);
        return response()->json([
            "request" => "Your request of Lift: $lift\nReps: $reps\nWith:$mode\nwill be processed"
        ]);
    }
    public function get_leaderboards(Request $request){
        if(!Auth::check()){
            return abort(404);
        }
        return response()->json(["data"=>user_milestones::limit(5)->orderByDesc("weight")->where("lift",$request->get("lift"))->where("reps",$request->get("reps"))->whereNot("weight",0)->get(["username","weight"])->toArray()]) ;
    }
    public function confirm_and_set(Request $request){
        $id = $request->get("id");
        $membership = $request->get("membership");
        User::where("id",$id)->update(["payment_status"=>true]);
        user_membership::where("userMem_ID",$id)->update(["membership_type"=>$membership, "start_date"=>Carbon::now()->toDateString(),"expiry_date"=>Carbon::now()->addMonth()->toDateString(),"next_payment"=>Carbon::now()->addMonth()->toDateString()]);
        return response()->json(["response"=>"User id $id confirmed"]);
        
    }
}   
