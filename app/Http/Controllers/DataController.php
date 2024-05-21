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
use Session;
use Carbon\Carbon;

class DataController extends Controller
{

    //
    public function register(Request $request){
        $request->validate(get_config('register'));
        $credentials = extract_data(\converter::get_converted('credential'),get_config('credential'),$request->only(get_config('credential')));
        $profile = extract_data(\converter::get_converted('profile'),get_config('profile'),$request->only(get_config('profile')) );
        $membership = extract_data(\converter::get_converted('membership'),get_config('membership'),$request->only(get_config('membership')));
        $membership['membership_desc'] = "abcsadj";
        $membership['payment_status'] = $membership['payment_status']=="Yes";
        $membership['expiry_date'] = Carbon::now()->addMonth();
        $membership['next_payment'] = Carbon::now()->addMonth();
        $profile['user_ID'] = latest_mem()+1;
        $profile['userMem_ID'] = latest_mem()+ 1;
        User::create($credentials);
        user_membership::create($membership);
        user_profile::create($profile);
        return back();
    }
    public function getUser($id){
        if($id>latest_mem()){
            return abort(404);
        }
        $cred = User::where('id', $id)->first();
        $prof = user_profile::where("profile_ID", $id)->first();
        $memb = user_membership::where("userMem_ID", $id)->first();
        $assess = user_assessment::where("userAsses_ID",$id)->first();
        return response()->json([
            "viewDetail" => "Details of ".$prof->firstName." ".$prof->lastName, 
            "viewEmail" => $cred->email,
            "viewUsername" => $cred->username,
            "viewFName" => $prof->firstName,
            "viewLName" => $prof->lastName,
            "viewContactDetails" => $prof->contactDetails,
            "viewBirthdate" => $prof->birthdate,
            "viewAddressNum" => $prof->address_num,
            "viewAddressStreet"=> $prof->address_street,
            "viewAddressCity"=> $prof->address_city,
            "viewAddressRegion" => $prof->address_region,
            "viewProfileBio" =>$prof->profileBio,
            "viewMembershipType" => $memb->membership_type,
            "viewMembershipPlan" => $memb->membership_plan,
            "viewMembershipDesc" => $memb->membership_desc,
            "viewStartDate" => $memb->start_date,
            "viewExpiryDate" => $memb->expiry_date,
            "viewNextPayment" => $memb->next_payment,
            "viewPaymentStatus" => $memb->payment_status == 1? "Yes" : "No",
            'viewTrainer' => $memb->Trainer,
            "viewHeight" => isNull($assess)?0:$assess->height,
            "viewWeight" => isNull($assess)?0:$assess->weight,
            "viewBMI" => isNull($assess)?0:$assess->bmi,
            "viewBMIType" => isNull($assess)?"Unknown":$assess->bmi_classification,
            "viewHasIllness" =>     (isNull($assess)?"Yes":$assess->hasIllness==1)    ?"Yes":"No",
            "viewHasInjuries" =>    (isNull($assess)?"Yes":$assess->hasInjuries==1)   ?"Yes":"No",
            "viewMedicalHistory" => isNull($assess)?"Unknown":$assess->medical_history
        ]);
        
        
    }
    public function update(Request $request,$what ,$id){
        $request->validate(get_config($what));
        $data = extract_data(\converter::get_converted($what),array_keys(get_config($what)),$request->only(array_keys(get_config($what))));
        switch($what){
            case "editCredential":
                User::where("id", "=",$id)->update($data);
                break;
            case "editProfile":
                user_profile::where("profile_ID", "=", $id)->update($data);
                break;
            case "editMembership":
                user_membership::where("userMem_ID", "=", $id)->update($data);
                break;
            case "editAssessment":
                $bmi = new \BMI($data['height'],$data['weight']);

                $data["bmi"] = $bmi::$bmi;
                $data['bmi_classification'] = $bmi::type();
                $data['hasIllness'] = $data['hasIllness']=="Yes";
                $data['hasInjuries'] = $data['hasInjuries']=="Yes";
                user_assessment::where("userAsses_ID", "=", $id)->update($data);
                break;
        }
        return back();

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
        dd($request->all());
        $bmi = new \BMI($request->userHeight,$request->userWeight);
        $assessment = [
            "userAsses_ID" =>$request->userID,
            "profile_ID" => $request->userID,
            "height" => $request->userHeight,
            "weight" => $request->userWeight,
            "bmi" => $bmi->bmi,
            "bmi_classification" => $bmi::type(),
            "medical_history" => $request->userMedHist,
            "hasIllness" => $request->userHasIllness=="Yes",
            "hasInjuries" => $request->userHasInjuries=="Yes",
            "created_at" => Carbon::now()
        ];
        user_assessment::create();
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
        $bmi = new \BMI($request->userHeight,$request->userWeight);
        user_assessment::where("userAssess_ID", "=", $request->userID)->update([
            "height" => $request->userHeight,
            "weight" => $request->userWeight,
            "bmi" => $bmi->bmi,
            "bmi_classification" => $bmi::type(),
            "medical_history" => $request->userMedHist,
            "hasIllness" => $request->userHasIllness,
            "hasInjuries" => $request->userHasInjuries,
        ]);
    }

    public function delete($id){
        User::find($id)->delete();
        user_membership::where('userMem_ID',$id)->delete();
        return back();
    }
}
