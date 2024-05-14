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


class AuthController extends Controller
{   
    public function push(){
        User::create([
            "username" => 'aleba678',
            "password" => Hash::make('123456'),
            "email" => "test@mail.com",
            "user_type" => "admin",
            "created_at" => Carbon::now()
        ]);
        user_membership::create([
            "membership_type" => $this->getMembershipType(1),
            "membership_plan" => $this->getPlan(3),
            "membership_desc" => "desc goes here",
            "start_date" => date("Y-m-d"),
            "expiry_date" => date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d")))),
            "next_payment" => date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d")))),
            "payment_status" =>true,
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
        user_assessment::create([
            "height" => 5.2,
            "weight" => 160.2,
            "bmi" => $this->getBMI(160.2,5.2),
            "bmi_classification" => $this->getBMI(160.2,5.2),
            "medical_history" => "Medical history",
            "hasIllness" => false,
            "hasInjuries" => false,
            "created_at" => Carbon::now(),
            "profile_ID" => 1,
        ]);
    }
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

    public function index()
    {
        if (Auth::check()) {

            return redirect()->intended('/dashboard');
        }
        return view('index', ["count" => User::count()]);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('auth.login');
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('auth.register', ['count' => User::count()]);
    }


    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    public function count()
    {
        return response()->json(['count' => DB::table('users')->count()]);
    }

    public function registerPost(Request $request)
    {
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
    public function updateUser(Request $request)
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
    public function account($id)
    {   
        if (Auth::check()) {
            $data = $this->get_user($id)->getData();
            if(isset($data->error)){
                abort(404);
            }
            return view('auth.account', ["data" => $this->get_user($id)->getData()]);
        }
        return redirect('/');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            if (User::where('id', Auth::id())->first()->user_type == "user") {
                return view('dashboard.user');
            }
            return view('dashboard.index', ["members" => $this->all_members_for_member_list(), "count" => user_membership::where("membership_type", "Member")->count(),"monthly"=>User::whereMonth('created_at',"=",date('m'))->count()]);
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function deleteUser(int $id){
        User::find($id)->delete();
        user_membership::where('userMem_ID',$id)->delete();
        return back();
    }
    public function get_user(int $id)
    {
        if(!Auth::check()) {
            return back();
        }
        if (User::find($id) == null) {
            abort(404);
        }
        $user = User::where('id', $id)->first();
        $profile = user_profile::where("profile_ID", $id)->first();
        $membership = user_membership::where("userMem_ID", $id)->first();
        $assessment = user_assessment::where("userAsses_ID", $id)->first();

        return response()->json([
            "editUserLabel" => "Details of " . $profile->firstName . " " . $profile->lastName,
            "editUsername" => $user->username,
            "editUserType" => $user->user_type,
            "editFname" => $profile->firstName,
            "editLname" => $profile->lastName,
            "editProfileBio" => $profile->profileBio,
            "editContactNum" => $profile->contactDetails,
            "editWeight" => $assessment->weight,
            "editHeight" => $assessment->height,
            "editBMI" => $assessment->bmi,
            "editBMIType" => $assessment->bmi_classification,
            "editBirthdate" => $profile->birthdate,
            "editMembershipType" => ["Member" => 1, "Non-Member" => 2][$membership->membership_type],
            "editMembershipPlan" => ["Basic" => 1, "Standard" => 2, "Premium" => 3][$membership->membership_plan],
            "editMembershipDesc" => $membership->membership_desc,
            "editAddressNum" => $profile->address_num,
            "editAddressStreet" => $profile->address_street,
            "editAddressCity" => $profile->address_city,
            "editAddressRegion" => $profile->address_region,
            "editEmail" => $user->email,
            "editTrainer" => $membership->Trainer,
            "editStartDate" => $membership->start_date,
            "editExpiryDate" => $membership->expiry_date,
            "editNextPayment" => $membership->next_payment,
            "editHasIllness" => $assessment->hasIllness,
            "editHasInjuries" => $assessment->hasInjuries,
            "editMedicalHistory" => $assessment->medical_history
        ]);

    }
    
    private function all_members_for_member_list()
    {
        $data = [];

        for ($i = 0; $i < User::count(); $i++) {
            $prof = user_profile::select(["lastName", "firstName"])->where("profile_ID", $i + 1)->first();
            $memb = user_membership::select(["membership_plan", "start_date", "expiry_date", "payment_status", "membership_type"])->where("userMem_ID", $i + 1)->first();
            if ($memb->membership_type == 'Member') {
                array_push($data, [
                    "LastName" => $prof->lastName,
                    "FirstName" => $prof->firstName,
                    "MemPlan" => $memb->membership_plan,
                    "MemStart" => $memb->start_date,
                    "MemEnd" => $memb->expiry_date,
                    'PayStat' => $memb->payment_status == 1 ? "Paid" : "Unpaid"
                ]);
            }
        }



        return $data;
    }
    public function create_assessment(Request $request){
        $request->validate([
            "userID"=>"required",
            "userWeight"=>"required",
            "userHeight"=> "required",
            "userMedHist"=> "required",
            "userHasIllness"=>"required",
            "userHasInjuries"=> "required",
        ]);
        user_assessment::create([
            "profile_ID" => $request->userID,
            "height" => $request->userHeight,
            "weight" =>$request->userWeight,
            "bmi" => $this->getBMI($request->userWeight,$request->userHeight),
            "bmi_classification" => $this->getBMIType($this->getBMI($request->userWeight,$request->userHeight)),
            "medical_history" => $request->userMedHist,
            "hasIllness" => $request->userHasIllness,
            "hasInjuries"=> $request->userHasInjuries,
            "created_at" => Carbon::now()
        ]);
        return back();
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->intended();
    }
}
