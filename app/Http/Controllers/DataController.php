<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\user_assessment;
use App\Models\user_membership;
use App\Models\user_profile;
class DataController extends Controller
{
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
    public function register(Request $request){
        $request->validate([
            'newProfID' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            "user_type" => "required",
            "membership_desc" => "required",
            "membership_plan" => "required",
            "membership_type" => "required",
            "payment_status" => "required",
            "trainer" => "required",
            "address_city" => "required",
            "address_num" => "required",
            "address_street" => "required",
            "address_region" => "required",
            "birthdate" => "required",
            "contact_number" => "required",
            "first_name" => "required",
            "last_name" => "required",
            "profile_bio" => "required",
            "medical_history" => "required",
            "hasIllness" => "required",
            "hasInjuries" => "required",
            "height" => "required",
            "weight" => "required"
        ]);

        User::create([
            "username" => $request->get("username"),
            "password" => Hash::make($request->get("password")),
            "email" => $request->get("email"),
            "user_type" => ["admin", "user"][$request->get("user_type") - 1],
            "created_at" => Carbon::now()
        ]);
        user_membership::create([
            "membership_type" => $this->getMembershipType($request->get("membership_type")),
            "membership_plan" => $this->getPlan($request->get("membership_plan")),
            "membership_desc" => $request->membership_desc,
            "start_date" => date("Y-m-d"),
            "expiry_date" => date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d")))),
            "next_payment" => date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d")))),
            "payment_status" => $request->get("payment_status"),
            "Trainer" => $request->get("trainer"),
            "created_at" => Carbon::now()
        ]);
        user_profile::create([
            "firstName" => $request->get("first_name"),
            "lastName" => $request->get("last_name"),
            "profileBio" => $request->get("profile_bio"),
            "contactDetails" => $request->get("contact_number"),
            "birthdate" => $request->get("birthdate"),
            "address_num" => $request->get("address_num"),
            "address_street" => $request->get("address_street"),
            "address_city" => $request->get("address_city"),
            "address_region" => $request->get("address_region"),
            "user_ID" => $request->get('newProfID'),
            "userMem_ID" => $request->get('newProfID'),
            "created_at" => Carbon::now()
        ]);
        user_assessment::create([
            "height" => $request->get("height"),
            "weight" => $request->get("weight"),
            "bmi" => $this->getBMI($request->get("weight"), $request->get("height")),
            "bmi_classification" => $this->getBMIType($this->getBMI($request->get("weight"), $request->get("height"))),
            "medical_history" => $request->get("medical_history"),
            "hasIllness" => $request->get("hasIllness"),
            "hasInjuries" => $request->get("hasInjuries"),
            "created_at" => Carbon::now(),
            "profile_ID" => $request->get('newProfID'),
        ]);
        return redirect()->intended();
    }
    public function update(Request $request)
    {
        $request->validate([
            "userID" => "required",
            "editUsername" => "required",
            "editUserType" => "required",
            "editFname" => "required",
            "editLname" => "required",
            "editProfileBio" => "required",
            "editContactNum" => "required",
            "editBirthdate" => "required",
            "editMembershipType" => "required",
            "editMembershipPlan" => "required",
            "editMembershipDesc" => "required",
            "editWeight" => "required",
            "editHeight" => "required",
            "editAddressNum" => "required",
            "editAddressStreet" => "required",
            "editAddressCity" => "required",
            "editAddressRegion" => "required",
            "editEmail" => "required",
            "editTrainer" => "required",
            "editStartDate" => "required",
            "editExpiryDate" => "required",
            "editNextPayment" => "required",
            "editPaymentStatus" => "required",
            "editHasIllness" => "required",
            "editHasInjuries" => "required",
            "editMedicalHistory" => "required"
        ]);

        $credentials = [
            "username" => $request->get("editUsername"),
            "email" => $request->get("editEmail"),
            "user_type" => $request->get("editUserType"),
        ];
        $membership = [
            "membership_type" => $this->getMembershipType($request->get("editMembershipType")),
            "membership_plan" => $this->getPlan($request->input("editMembershipPlan")),
            "membership_desc" => $request->get("editMembershipDesc"),
            "start_date" => $request->get("editStartDate"),
            "expiry_date" => $request->get("editExpiryDate"),
            "next_payment" => $request->get("editNextPayment"),
            "payment_status" => $request->get("editPaymentStatus"),
            "Trainer" => $request->get("editTrainer")
        ];
        $profile = [
            "firstName" => $request->get("editFname"),
            "lastName" => $request->get("editLname"),
            "profileBio" => $request->get("editProfileBio"),
            "contactDetails" => $request->get("editContactNum"),
            "birthdate" => $request->get("editBirthdate"),
            "address_num" => $request->get("editAddressNum"),
            "address_street" => $request->get("editAddressStreet"),
            "address_city" => $request->get("editAddressCity"),
            "address_region" => $request->get("editAddressRegion"),
        ];
        $assessment = [
            "height" => $request->get("editHeight"),
            "weight" => $request->get("editWeight"),
            "bmi" => $this->getBMI($request->get("editWeight"), $request->get("editHeight")),
            "bmi_classification" => $this->getBMIType($this->getBMI($request->get("editWeight"), $request->get("editHeight"))),
            "medical_history" => $request->get("editMedicalHistory"),
            "hasIllness" => $request->get("editHasIllness"),
            "hasInjuries" => $request->get("editHasInjuries")
        ];

        User::where("id", "=", $request->userID)->update($credentials);
        user_membership::where("userMem_ID", "=", $request->userID)->update($membership);
        user_profile::where("profile_ID", "=", $request->userID)->update($profile);
        user_assessment::where("userAsses_ID", "=", $request->userID)->update($assessment);


        return redirect()->intended()->with(["success" => "User successfully updated"]);
    }
}
