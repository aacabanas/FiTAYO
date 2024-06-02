<?php

namespace App\Http\Controllers;

use App\Models\user_assessment;
use App\Models\user_profile;
use App\Models\user_membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DataController extends Controller
{

    //
    public function register(Request $request)
    {

        $request->validate([
            "regID" => "required",
            "regMem" => "required",#in user_membership also
            #Model user_profile
            "regFName" => "required",
            "regLName" => "required",
            "regContactPrefix" => "required",
            "regContactDetails" => "required",
            "regBirthdate" => "required",
            "regRegion" => "required",
            "regCity" => "required",
            "regBarangay" => "required",
            "regStreetNum" => "required",
            #Model user_membership
            "regMembershipPlan" => "required",
            "regStartDate" => "required",
            "regPaymentStatus" => "required",
            #Model: User
            "regUsername" => "required",
            "regPassword" => "required",
            "regEmail" => "required"
        ]);
        User::create([
            "username" => $request->regUsername,
            "email" => $request->regEmail,
            "password" => Hash::make($request->password)
        ]);

        user_membership::create([
            'membership_type' => $request->regMem,
            "membership_plan" => $request->regMembershipPlan,
            "start_date" => $request->regStartDate,
            "expiry_date" => Carbon::parse($request->regStartDate)->addMonth(),
            "next_payment" => Carbon::parse($request->regStartDate)->addMonth(),
            "payment_status" => $request->regPaymentStatus == "Yes"
        ]);
        user_profile::create([
            'firstName' => $request->regFName,
            'lastName' => $request->regLName,
            'contact_prefix' => $request->regContactPrefix,
            'contactDetails' => $request->regContactDetails,
            'birthdate' => $request->regBirthdate,
            'age' => (int) Carbon::parse($request->regBirthdate)->diffInYears(Carbon::now()),
            'address_street_num' => $request->regStreetNum,
            'address_barangay' => $request->regBarangay,
            'address_city' => $request->regCity,
            'address_region' => $request->regRegion,
            'user_ID' => $request->regID,
            'userMem_ID' => $request->regID
        ]);
        $id = $request->regID;
        $username = base64_encode($request->regUsername);
        $JSON = base64_encode(json_encode(["id"=>$id,"username"=>$username]));
        $qr = QrCode::format('png')->size(200)->errorCorrection('H')->generate($JSON);
        $file = "$id.png";
        Storage::disk('qr')->put($file,$qr);
        return back();
    }
    public function getUpdatable($id)
    {
        if ($id > latest_mem()) {
            return abort(404);
        }
        $cred = User::where('id', $id)->first();
        $prof = user_profile::where("profile_ID", $id)->first();
        $memb = user_membership::where("userMem_ID", $id)->first();
        $assess = user_assessment::where("userAsses_ID", $id)->first();
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
            "editHeight" => ($assess==null)?0:$assess->height,
            "editWeight" => ($assess==null)?0:$assess->weight,
            "editBMI" => ($assess==null)?0:$assess->bmi,
            "editBMIType" => ($assess==null)?null:$assess->bmi_classification,
            "editFit" => ($assess==null)?"No":($assess->physically_fit == 1 ? "Yes" : "No"),
            "editOper" => ($assess==null)?"No":($assess->operation == 1 ? "Yes" : "No"),
            "editHB" => ($assess==null)?"No":($assess->high_blood == 1 ? "Yes" : "No"),
            "editHP" => ($assess==null)?"No":($assess->heart_problem == 1 ? "Yes" : "No"),
            "editEmergName" => ($assess==null)?"":$assess->emergency_contact_name,
            "editEmergNum" => ($assess==null)?"":$assess->emergency_contact_num,
        ]);
    }
    public function getUser($id)
    {
        if ($id > latest_mem()) {
            return abort(404);
        }
        $cred = User::where('id', $id)->first();
        $prof = user_profile::where("profile_ID", $id)->first();
        $memb = user_membership::where("userMem_ID", $id)->first();
        $assess = user_assessment::where("userAsses_ID", $id)->first();
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
            "viewHeight" => $assess->height,
            "viewWeight" => $assess->weight,
            "viewBMI" => $assess->bmi,
            "viewBMIType" => $assess->bmi_classification,
            "viewFit" => $assess->physically_fit == 1 ? "Yes" : "No",
            "viewOper" => $assess->operation == 1 ? "Yes" : "No",
            "viewHB" => $assess->high_blood == 1 ? "Yes" : "No",
            "viewHP" => $assess->heart_problem == 1 ? "Yes" : "No",
            "viewEmergName" => $assess->emergency_contact_name,
            "viewEmergNum" => $assess->emergency_contact_num,
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
                'height'                => $request->editHeight,
                'weight'                => $request->editWeight,
                'bmi'                   => $request->editBMI,
                'bmi_classification'    => $request->editBMIType,
                'physically_fit'        => $request->editFit,
                'operation'             => $request->editOper,
                'high_blood'            => $request->editHB,
                'heart_problem'         => $request->editHP,
                'emergency_contact_name'=> $request->editEmergName,
                'emergency_contact_num' => $request->editEmergNum,
            ]);
        }

        return back();

    }
    public function create_assessment(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            "regHeight" => "required",
            "regWeight" => "required",
            "regBMI" => "required",
            "regBMIType" => "required",
            "regFit" => "required",
            "regOper" => "required",
            "regBP" => "required",
            "regHeart" => "required",
            "regEmergName" => "required",
            "regEmergContact" => "required"
        ]);
        user_assessment::create([
            'userAsses_ID' => $id,
            'height' => $request->regHeight,
            'weight' => $request->regWeight,
            'bmi' => $request->regBMI,
            'bmi_classification' => $request->regBMIType,
            'physically_fit' => $request->regFit == "Yes",
            'operation' => $request->regOper == "Yes",
            'high_blood' => $request->regBP == "Yes",
            'heart_problem' => $request->regHeart == "Yes",
            'emergency_contact_name' => $request->regEmergName,
            'emergency_contact_num' => $request->regEmergContact,
            'profile_ID' => $id,
            'medical_history' => ""

        ]);
        return back();
    }



    public function delete($id)
    {
        User::find($id)->delete();
        user_membership::where('userMem_ID', $id)->delete();
        return back();
    }
    public function get_region()
    {
        if (!Auth::check() || Auth::user()->user_type == "user") {
            abort(404);
        }
        return response()->json(\JSON_DATA::get_regions());
    }
    public function get_cities($region_code)
    {
        if (!Auth::check() || Auth::user()->user_type == "user") {
            abort(404);
        }
        return response()->json(\JSON_DATA::get_cities($region_code));
    }
    public function get_barangays($region_code, $city_code)
    {
        if (!Auth::check() || Auth::user()->user_type == "user") {
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
        return response()->file(public_path() . "\\flags\\" . $code . ".png");
    }
}
