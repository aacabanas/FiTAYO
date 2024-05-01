<?php

use App\Models\User;
use App\Models\user_assessment;
use App\Models\user_credentials;
use App\Models\user_membership;
use App\Models\user_profile;

if (!function_exists("userAuth")) {
    function userAuth(): ?User
    {
        return auth()->user();
    }
    ;
}
if (!function_exists("getBMI")) {
    function getBMI($weight, $height)
    {
        return round(($weight / (($height * 12) * ($height * 12)) * 703), 2);
    }
}
if (!function_exists("getBMIType")) {
    function getBMIType($bmi): string
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
}

if (!function_exists("getMembershipType")) {
    function getMembershipType(int $type)
    {
        return ["Member", "Non-Member"][$type - 1];
    }
}
if (!function_exists("getUserType")) {
    function getUserType(int $type)
    {
        return ["admin", "user"][$type - 1];
    }
}
if (!function_exists("getMember")) {
    function getMember(int $id): array
    {
        $credentials = user_credentials::where("user_ID", $id)->first();
        $membership = user_membership::where("userMem_ID", $id)->first();
        $profile = user_profile::where("profile_ID", $id)->first();
        return [
            "Membership_ID" => $credentials->user_ID,
            "Last Name" => $profile->lastName,
            "First Name" => $profile->firstName,
            "Mem Plan" => $membership->membership_plan,
            "Mem Expiry" => $membership->expiry_date,
            "Pay Status" => $membership->payment_status == 1 ? "Paid" : "Unpaid"
        ];
    }
}
if (!function_exists("getAllMembers")) {
    function getAllMembers(string $table = null): array
    {
        $data = [
            "credentials" => DB::table("user_credentials")->get()->toArray(),
            "membership" => DB::table("user_membership")->get()->toArray(),
            "assessment" => DB::table("user_assessment")->get()->toArray(),
            "profile" => DB::table("user_profile")->get()->toArray()
        ];
        return ($table == null) ? $data : $data[$table];

    }
}
if (!function_exists("getMemberDetail")) {
    function getMemberDetail(int $id): array
    {
        $credentials = user_credentials::select([
            'user_ID',
            'username',
            'password',
            'user_email',
            'user_type'
        ])->where("user_ID", $id)->first();
        $membership = user_membership::select([
            'membership_type',
            'membership_desc',
            'membership_plan',
            'start_date',
            'expiry_date',
            'next_payment',
            'payment_status',
            'Trainer'
        ])->where("userMem_ID", $id)->first();
        $profile = user_profile::select([
            'firstName',
            'lastName',
            'profileBio',
            'contactDetails',
            'birthdate',
            'address_num',
            'address_street',
            'address_city',
            'address_region',
        ])->where("profile_ID", $id)->first();
        $assessment = user_assessment::select([
            'height',
            'weight',
            'bmi',
            'bmi_classification',
            'medical_history',
            'hasIllness',
            'hasInjuries',
        ])->where("userAsses_ID", $id)->first();
        return ["user_credential"=>$credentials,"user_membership"=>$membership,"user_profile"=>$profile,"user_assessment"=>$assessment];
    }
}
if (!function_exists("getPlan")) {
    function getPlan(int $plan): string
    {
        return ["Basic", "Standard", "Premium"][$plan - 1];
    }
}
if (!function_exists("totalMember")) {
    function totalMember(): array
    {
        return ["count" => DB::table('user_credentials')->count("user_ID")];
    }
}
