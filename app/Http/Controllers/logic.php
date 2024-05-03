<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\user_credentials;
use App\Models\user_membership;
use App\Models\user_profile;
use Carbon\Carbon;


use App\Models\user_assessment;

class logic extends Controller
{
    public function push()
    {
        //reference for inserting data
        $credentials = [
            "username"      => "walalang1",
            "password"      => Hash::make("p0l1k2s3"),
            "user_email"    => "something1something@mail.com",
            "user_type"     => 1,
            "created_at"    => Carbon::now(),
        ];
        $date_now = Carbon::now();
        //membership
        $membership = [
            "membership_type"   => 1,
            "membership_plan"   => 1,
            "membership_desc"   => "LOL",
            "start_date"        => $date_now,
            "expiry_date"       => $date_now->addMonth(),
            "next_payment"      => $date_now->addWeek()->addWeek(),
            "payment_status"    => 0,
            "Trainer"           => "WHO?????",
            "created_at"        => Carbon::now(),
        ];
        //profile
        $profile = [
            "firstName"         => "hello",
            "lastName"          =>  "world",
            "profileBio"        => "undisclosed",
            "contactDetails"    => "09123456789",
            "birthdate"         =>  date("Y-m-d"),
            "address_num"       =>  "124",
            "address_street"    =>  "sowm",
            "address_city"      =>  "hello",
            "address_region"    =>  "thanks",
            "created_at"        => Carbon::now(),
            "user_ID"           => (DB::table("user_credentials")->count("user_ID")==0)? 1:DB::table("user_credentials")->get("user_ID")->last()->user_ID,
            "userMem_ID"        => (DB::table("user_membership")->count()==0)?1:DB::table("user_membership")->get("userMem_ID")->last()->userMem_ID,
        ];
        //assessment
        $assessment = [
            "height"                => 5.2,
            "weight"                => 130.25,
            "bmi"                   => getBMI(130.25,5.2),
            "bmi_classification"    => getBMIType(getBMI(130.25,5.2)),
            "medical_history"       => "NONE",
            "hasIllness"            => 1,
            "hasInjuries"           => 0,
            "created_at"            => Carbon::now(),
            "profile_ID"            => (DB::table("user_profile")->count()==0)?1:DB::table("user_profile")->get("profile_ID")->last()->profile_ID,
        ];
        user_credentials::insert($credentials);
        user_membership::insert($membership);
        user_profile::insert($profile);
        user_assessment::insert($assessment);
    }


    
    //data handling + more    
    
    
}
