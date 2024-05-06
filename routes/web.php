<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\user_assessment;
use App\Models\user_profile;
use App\Models\user_membership;
use App\Models\User;

Route::get("/", [AuthController::class,"index"])->name('index');
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::get('/dashboard', [AuthController::class,'dashboard'])->name('dashboard');
Route::get('/register', [AuthController::class,'registration'])->name('register');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/account/{id}', [AuthController::class,'account'])->name('account');
Route::get('/count', [AuthController::class,'count'])->name('count');
Route::post('/login', [AuthController::class,'loginPost'])->name('login.POST');
Route::post('/register', [AuthController::class,'registerPost'])->name('register.POST');
Route::post('/update', [AuthController::class,'updateUser'])->name('update.POST');
Route::get('/member/{id}', function (int $id){
    if(User::count()==0)return response('User not found',404);
    $user = User::where('id', $id)->first();
    $profile = user_profile::where("profile_ID",$id)->first();
    $membership = user_membership::where("userMem_ID",$id)->first();
    $assessment = user_assessment::where("userAsses_ID",$id)->first();

    return response()->json([
        "editUserLabel" => "Details of " . $profile->firstName ." ". $profile->lastName,
        "editUsername" => $user->username,
        "editUserType" => ["admin"=>1,"user"=>2][$user->user_type],
        "editFname" => $profile->firstName,
        "editLname" => $profile->lastName,
        "editProfileBio" => $profile->profileBio,
        "editContactNum" => $profile->contactDetails,
        "editWeight" => $assessment->weight,
        "editHeight" => $assessment->height,
        "editBMI" =>$assessment->bmi,
        "editBMIType" => $assessment->bmi_classification,
        "editBirthdate"=>$profile->birthdate,
        "editMembershipType" => ["Member"=> 1, "Non-Member"=> 2 ][$membership->membership_type],
        "editMembershipPlan" => ["Basic"=>1,"Standard"=>2,"Premium"=>3][$membership->membership_plan],
        "editMembershipDesc" =>$membership->membership_desc,
        "editAddressNum"=>$profile->address_num,
        "editAddressStreet"=>$profile->address_street,
        "editAddressCity" =>$profile->address_city,
        "editAddressRegion"=> $profile->address_region,
        "editEmail"=>$user->email,
        "editTrainer"=>$membership->Trainer,
        "editStartDate"=>$membership->start_date,
        "editExpiryDate"=>$membership->expiry_date,
        "editNextPayment" => $membership->next_payment,
        "editHasIllness" => $assessment->hasIllness,
        "editHasInjuries" => $assessment->hasInjuries,
        "editMedicalHistory" => $assessment->medical_history
    ]);});